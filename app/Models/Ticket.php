<?php

namespace App\Models;

use App\Scopes\AgentScope;
use App\Traits\Auditable;
use App\Notifications\CommentEmailNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Ticket extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use Auditable;
    use HasFactory;
    public $table = 'tickets';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'content',
        'status_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'priority_id',
        'category_id',
        'author_name',
        'author_email',
        'assigned_to_user_id',
    ];

    public static function boot(): void
    {
        parent::boot();

        Ticket::observe(new \App\Observers\TicketActionObserver);

        static::addGlobalScope(new AgentScope);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'ticket_id', 'id');
    }

    public function getAttachmentsAttribute(): \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection
    {
        return $this->getMedia('attachments');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function priority()
    {
        return $this->belongsTo(Priority::class, 'priority_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function assigned_to_user()
    {
        return $this->belongsTo(User::class, 'assigned_to_user_id');
    }

    public function scopeFilterTickets($query): void
    {
        $query->when(request()->input('priority'), function($query): void {
                $query->whereHas('priority', function($query): void {
                    $query->whereId(request()->input('priority'));
                });
            })
            ->when(request()->input('category'), function($query): void {
                $query->whereHas('category', function($query): void {
                    $query->whereId(request()->input('category'));
                });
            })
            ->when(request()->input('status'), function($query): void {
                $query->whereHas('status', function($query): void {
                    $query->whereId(request()->input('status'));
                });
            });
    }

    public function sendCommentNotification($comment): void
    {
        $users = \App\Models\User::where(function ($q): void {
                $q->whereHas('roles', function ($q) {
                    return $q->where('title', 'Agent');
                })
                ->where(function ($q): void {
                    $q->whereHas('comments', function ($q) {
                        return $q->whereTicketId($this->id);
                    })
                    ->orWhereHas('tickets', function ($q) {
                        return $q->whereId($this->id);
                    });
                });
            })
            ->when(!$comment->user_id && !$this->assigned_to_user_id, function ($q): void {
                $q->orWhereHas('roles', function ($q) {
                    return $q->where('title', 'Admin');
                });
            })
            ->when($comment->user, function ($q) use ($comment): void {
                $q->where('id', '!=', $comment->user_id);
            })
            ->get();
        $notification = new CommentEmailNotification($comment);

        Notification::send($users, $notification);
        if($comment->user_id && $this->author_email)
        {
            Notification::route('mail', $this->author_email)->notify($notification);
        }
    }
}

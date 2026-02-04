<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class AgentScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model): void
    {
        $user = auth()->user();

        if (!auth()->check()) {
            return;
        }

        if (!request()->is('admin/*')) {
            return;
        }

        $isAgent = $user->roles->contains(2);
        $isAdmin = $user->roles->contains(1);

        if ($isAgent && !$isAdmin) {
            $builder->where('assigned_to_user_id', $user->id);
        }
    }
}
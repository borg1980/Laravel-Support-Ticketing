<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PagesTest extends TestCase
{

    public function test_audit_logs_view()
    {
        $user = \App\User::find(1);
        $this->actingAs($user);
        $response = $this->get(uri: '/admin/audit-logs');
        $response->assertStatus(200);
    }


    public function test_tickets_view()
    {
        $user = \App\User::find(1);
        $this->actingAs($user);
        $response = $this->get(uri: '/admin/tickets');
        $response->assertStatus(200);
    }

    public function test_comments_view()
    {
        $user = \App\User::find(1);
        $this->actingAs($user);
        \Gate::define('comment_access', function ($user) {
            return true;
        });
        $response = $this->get(uri: '/admin/comments');
        $response->assertStatus(200);
    }
}

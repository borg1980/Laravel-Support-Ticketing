<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Ticket;

class TicketFactoryTest extends TestCase
{

    /** @test */
    public function it_can_create_a_ticket_using_factory()
    {
        $ticket = \App\Models\Ticket::factory()->count(1000)->create();

        $this->assertDatabaseHas('tickets', [
            'id' => $ticket[0]->id,
        ]);
    }
}
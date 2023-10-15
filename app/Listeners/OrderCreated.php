<?php

namespace App\Listeners;

use App\Events\OrderCreated as EventsOrderCreated;
use App\Models\Admin;
use App\Notifications\OrderNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OrderCreated
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
//        
    }

    /**
     * Handle the event.
     */
    public function handle(EventsOrderCreated $event): void
    {
        $admin = Admin::where('id', 1)->first();
        $admin->notify(new OrderNotification($event->cart));
    }
}

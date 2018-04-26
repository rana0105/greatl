<?php

namespace App\Listeners;

use App\Events\ClientChatEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ClientChatListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ClientChatEvent  $event
     * @return void
     */
    public function handle(ClientChatEvent $event)
    {
        
    }
}

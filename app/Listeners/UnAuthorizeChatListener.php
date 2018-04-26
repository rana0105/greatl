<?php

namespace App\Listeners;

use App\Events\UnAuthorizeChatEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UnAuthorizeChatListener
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
     * @param  UnAuthorizeChatEvent  $event
     * @return void
     */
    public function handle(UnAuthorizeChatEvent $event)
    {
        //
    }
}

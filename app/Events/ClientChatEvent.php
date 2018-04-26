<?php

namespace App\Events;

use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ClientChatEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $receiver;
    public $message;
    private $project;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, $receiver, $project, $message)
    {
        $this->user = $user;
        $this->receiver = $receiver;
        $this->message = $message;
        $this->project = $project;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        // return new PrivateChannel('client-chat');
        return new PrivateChannel('client-chat.'. $this->user->id .'.project.'.$this->project);
    }
}

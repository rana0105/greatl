<?php

namespace App\Notifications;

use App\Model\JobPost;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplyNotify extends Notification
{
    use Queueable;

    public $project;
    public $freelancer;
    public $status;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(JobPost $project, User $freelancer, $status)
    {
        $this->project    = $project;
        $this->freelancer = $freelancer;
        $this->status     = $status;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','broadcast'];
    }
    
    public function toDatabase($notifiable)
    {
        return $this->notifyData();
    }
    public function toBroadcast($notifiable)
    {
        return (new BroadcastMessage(['data' => $this->notifyData()]));
    }
    
    public function toArray($notifiable)
    {
        return $this->notifyData();
    }

    private function notifyData()
    {
        return [
            'project' => [
                'project_id' => $this->project->id,
                'title' => $this->project->p_title,
            ],
            'freelancer' => [
                'id' => $this->freelancer->id,
                'name' => $this->freelancer->name,
            ],
            'status' => $this->status,
        ];
    }
}

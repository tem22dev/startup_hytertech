<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class UpdateStatusStation implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }
    public function broadcastOn()
    {
        return ['status-channel'];
    }
    public function broadcastAs()
    {
        return 'update-status';
    }
    public function broadcastWith()
    {
        return  $this->data;
    }
}

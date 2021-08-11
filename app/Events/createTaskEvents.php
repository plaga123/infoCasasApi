<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;



class createTaskEvents
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $arr_parametros;

   
    public function __construct($arr_parametros)
    {
        $this->arr_parametros = $arr_parametros;
    }   
}

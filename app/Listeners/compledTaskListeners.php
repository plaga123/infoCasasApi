<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Task;

class compledTaskListeners
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        try {
            $parametros = $event->arr_parametros;

            $task = Task::find($parametros['id']);
            $task->completed = 1;
            $task->save();

            return $task;

           
        } catch (Exception $e) {
            return $e;
        }
    }
}

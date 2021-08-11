<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Task;

class createTaskListeners extends Controller
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

            $task = new Task();
            $task->name = $parametros['name'];
            $task->detail = $parametros['detail'];
            $task->completed = 0;
            $task->date = now();
            $task->deleted = 0;
            $task->save();

        } catch (Exception $e) {
            return $this->JsonResponseError($ex, 'exception');
        }

        return $task;       
    }
}

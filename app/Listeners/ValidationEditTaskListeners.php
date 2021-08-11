<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Http\Controllers\Controller;
use App\Models\Task;

class ValidationEditTaskListeners extends Controller
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
            $modificar = false;

            $task = Task::find($parametros['id']);

            if (trim($parametros['name']) && !is_null($parametros['name']) && $task->name != $parametros['name']) {  
                $task->name = $parametros['name'];    
                $modificar = true;
            }   

            if (trim($parametros['detail']) && !is_null($parametros['detail']) && $task->detail != $parametros['detail']) {  
                $task->detail = $parametros['detail'];    
                $modificar = true;
            }           

            $response['value'] = $modificar;
            $response['data'] = $task;

            return $response;
            
              
        } catch (Exception $ex) {
            return $this->JsonResponseError($ex, 'exception');        
        }

    }
}

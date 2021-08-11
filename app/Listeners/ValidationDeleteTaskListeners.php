<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Http\Controllers\Controller;
use App\Models\Task;

class ValidationDeleteTaskListeners extends Controller
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
        $parametros = $event->arr_parametros;

        try {
            $task = Task::find($parametros['id']);
            
            if(!$task){
                $response['value'] = false;
                $response['message'] = 'No existe registro con este ID:'.$parametros['id'];
                return $response;
            }
            
            $response['value'] = true;
            $response['data'] = $task;
                
            return $response;

          } catch (Exception $ex) {
            return $this->JsonResponseError($ex, 'exception');        
        }
    }
}

<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Http\Controllers\Controller;
use App\Models\Task;

class ValidationCreateTaskListeners extends Controller
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

            if (trim($parametros['name']) == false) {
                $response['value'] = $parametros['name'];
                $response['info'] = "Por favor introduzca un nombre";
                return $this->JsonResponseBadRequest($response);
            }         
            if (trim($parametros['detail']) == false) {
                $response['value'] = $parametros['detail'];
                $response['info'] = "Por favor introduzca un detalle";
                return $this->JsonResponseBadRequest($response);
            }
            return 'ok';

        } catch (Exception $e) {
            return $this->JsonResponseError($ex, 'exception');
        }
      
    }
}

<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Http\Controllers\Controller;
use App\Models\Task;

class editTaskListeners extends Controller
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
            $parametros->save();           
        } catch (Exception $e) {
            return $this->JsonResponseError($ex, 'exception');
        }

        return $parametros;     
    
    }
}

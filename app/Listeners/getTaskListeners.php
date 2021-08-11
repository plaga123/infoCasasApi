<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Http\Controllers\Controller;
use App\Models\Task;
use DB;
class getTaskListeners extends Controller
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

            $task = DB::select(DB::raw("SELECT id,name,detail,date,
            if(completed=true,'completed','no completed')as completed  
            FROM tasks WHERE deleted=0"));
            

            } catch (Exception $e) {
                return $this->JsonResponseError($ex, 'exception');
            }
        return $task;
       
    }
}

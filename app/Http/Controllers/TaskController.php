<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

use App\Events\createTaskEvents;
use App\Events\editTaskEvents;
use App\Events\deleteTaskEvents;
use App\Events\ValidationCreateTaskEvent;
use App\Events\ValidationEditTaskEvent;
use App\Events\ValidationDeleteTaskEvent;
use App\Events\getTaskEvents;
use App\Events\compledTaskEvents;

class TaskController extends Controller
{
    

    public function createTask(Request $request)
    {
        $arr_parametros = $request->all();
        
        try {

            $validation = event(new ValidationCreateTaskEvent($arr_parametros));

            if($validation[0] != 'ok'){
                return $this->JsonResponseBadRequest($validation);                            
            }
            
            $task = event(new createTaskEvents($arr_parametros));            
            
        } catch (Exception $e) {
            return $this->JsonResponseError($ex, 'exception');
        }
                
        return $this->JsonResponseSuccess($task,200,'Tarea creada');  
    }

    public function editTask(Request $request)
    {
        $arr_parametros = $request->all();
        
        try {

            $validation = event(new ValidationEditTaskEvent($arr_parametros));           

            if(!$validation[0]['value']){
                return $this->JsonResponseSuccess($validation[0]['data'], 200, "¡Registro sin alterar!");                             
            }
            
            $task = event(new editTaskEvents($validation[0]['data']));            
            
        } catch (Exception $e) {
            return $this->JsonResponseError($ex, 'exception');
        }
                
        return $this->JsonResponseSuccess($task,200,'Tarea actualizada');       
    }

    public function deleteTask(Request $request)
    {
        $arr_parametros = $request->all();
        
        try {

            $validation = event(new ValidationDeleteTaskEvent($arr_parametros));           

            if(!$validation[0]['value']){
                return $this->JsonResponseSuccess($validation[0]['message'], 200, $validation[0]['message']);                             
            }
            
            $task = event(new deleteTaskEvents($validation[0]['data']));            
            
        } catch (Exception $e) {
            return $this->JsonResponseError($ex, 'exception');
        }
                
        return $this->JsonResponseSuccess($task,200,'Tarea eliminada');       
    }

    public function getTask(Request $request)
    {
        $arr_parametros = $request->all();
        
        try {           
            
            $task = event(new getTaskEvents($arr_parametros));            
            
        } catch (Exception $e) {
            return $this->JsonResponseError($ex, 'exception');
        }
                
        return $this->JsonResponseSuccess($task);       
          
    }

    public function compledTask(Request $request)
    {
        $arr_parametros = $request->all();
        
        try {           
            
            $task = event(new compledTaskEvents($arr_parametros));            
            
        } catch (Exception $e) {
            return $this->JsonResponseError($ex, 'exception');
        }
                
        return $this->JsonResponseSuccess($task,200,'Tarea completada');        
          
    }




   
}

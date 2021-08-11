<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

use App\Events\createTaskEvents;
use App\Events\editTaskEvents;
use App\Events\deleteTaskEvents;
use App\Events\ValidationCreateTaskEvent;
use App\Events\ValidationEditTaskEvent;
use App\Events\ValidationDeleteTaskEvent;
use App\Events\getTaskEvents;
use App\Events\compledTaskEvents;


use App\Listeners\createTaskListeners;
use App\Listeners\editTaskListeners;
use App\Listeners\deleteTaskListeners;
use App\Listeners\ValidationCreateTaskListeners;
use App\Listeners\ValidationEditTaskListeners;
use App\Listeners\ValidationDeleteTaskListeners;
use App\Listeners\getTaskListeners;
use App\Listeners\compledTaskListeners;



class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
     
        createTaskEvents::class => [
            createTaskListeners::class
        ],
        ValidationCreateTaskEvent::class => [
            ValidationCreateTaskListeners::class
        ],
        editTaskEvents::class => [
            editTaskListeners::class
        ],
        ValidationEditTaskEvent::class => [
            ValidationEditTaskListeners::class
        ],
        deleteTaskEvents::class => [
            deleteTaskListeners::class
        ],
        ValidationDeleteTaskEvent::class => [
            ValidationDeleteTaskListeners::class
        ],
        getTaskEvents::class => [
            getTaskListeners::class
        ],
        compledTaskEvents::class => [
            compledTaskListeners::class
        ],
        

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

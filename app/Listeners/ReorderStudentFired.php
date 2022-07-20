<?php

namespace App\Listeners;

use App\Events\ReorderStudents;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class ReorderStudentFired
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
     * @param  \App\Events\ReorderStudent  $event
     * @return void
     */
    public function handle(ReorderStudents $event)
    {
        Mail::raw('Hello , Reorder student process is done', function ($message) {
            $message->to('rashash3lan@hotmail.com')
              ->subject('Reorder student ');
          });
    }
}

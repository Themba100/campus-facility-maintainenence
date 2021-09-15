<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Fault;
use App\Models\Message;

class FaultEventListner
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct($fault)
    {
        $this->fault = $fault
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $message = new Message;
        $message->id = 'id';
        $message->from = 'from';
        $message->to = 'to';
        $message->text = 'text';
        $fault = new Fault;
        $fault->user_id;
        $message->save();
    }
}

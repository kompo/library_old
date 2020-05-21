<?php

namespace Kompo\Library\Invitation;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Kompo\Library\Invitation\InvitationEmail;
use Kompo\Library\Invitation\InvitedToRegisterEvent;

class SendInvitationEmailListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(InvitedToRegisterEvent $event)
    {
        $notification = new InvitationEmail($event->invitation);
        Notification::route('mail', $event->invitation->email)->notify($notification);
    }
}

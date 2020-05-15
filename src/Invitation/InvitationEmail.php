<?php

namespace Kompo\Library\Invitation;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Kompo\Library\Invitation\Invitation;

class InvitationEmail extends Notification
{
    /**
     * The invitation model.
     *
     * @var string
     */
    public $invitation;

    /**
     * The callback that should be used to build the mail message.
     *
     * @var \Closure|null
     */
    public static $toMailCallback;

    /**
     * Create a notification instance.
     *
     * @param  Vuravel\Auth\Invitation  $invitation
     * @return void
     */
    public function __construct(Invitation $invitation)
    {
        $this->invitation = $invitation;
    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }

        return (new MailMessage)
            ->subject(__('Invitation to create an account'))
            ->line(__('You are invited to create an account on').' '.config('app.name').'.')
            ->action(__('Create account'), route('register', ['token' => $this->invitation->token]))
            ->line(__('If you did not request an invitation, no further action is required.'));
    }

    /**
     * Set a callback that should be used when building the notification mail message.
     *
     * @param  \Closure  $callback
     * @return void
     */
    public static function toMailUsing($callback)
    {
        static::$toMailCallback = $callback;
    }
}

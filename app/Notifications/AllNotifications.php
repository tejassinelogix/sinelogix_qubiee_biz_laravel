<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;



use Illuminate\Notifications\Messages\MailMessage;

class AllNotifications extends Notification {
    use Queueable;
    
    public function __construct() {
        
    }
    
    public function via($notifiable){
        return['mail'];
    }
    
    public function toMail($notifiable){
        return (new MailMessage)
        ->line('New post')
        ->action('Read Post',url('/'))
        ->line('Thank You');        
    }
}

<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Invoices;
use Illuminate\Support\Facades\Auth;

class Add_invoices_new extends Notification
{
    use Queueable;

    private $invoices;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( Invoices $invoices)
    {
       $this->invoices = $invoices; 
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
          //  'order_id' => $this->details['order_id']
            'id'=>$this->invoices->id,
            'title'=>'تم اضافة الفاتورة بواسطة',
            'user'=>Auth::user()->name
        ];
    }
}

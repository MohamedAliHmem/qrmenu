<?php
namespace App\Jobs;

use App\Mail\OrderShipped;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendOrderShippedEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $orderDetails;
    protected $email;
    protected $email2;

    public function __construct(array $orderDetails, string $email, string $email2 = null)
    {
        $this->orderDetails = $orderDetails;
        $this->email = $email;
        $this->email2 = $email2;
    }

    public function handle()
    {
        $mailable = new OrderShipped($this->orderDetails, $this->email, $this->email2);
        Mail::to($this->email)
            ->cc($this->email2)
            ->send($mailable);
    }
}

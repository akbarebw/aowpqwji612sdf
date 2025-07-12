<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifikasiEmail extends Notification
{
    use Queueable;

    protected $user;
    protected $verificationUrl;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $verificationUrl)
    {
        $this->user = $user;
        $this->verificationUrl = $verificationUrl;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
//        return (new MailMessage)
//            ->view('auth.verification', [
//                'user' => $this->user,
//                'verificationUrl' => $this->verificationUrl
//            ]);
        return (new MailMessage)
            ->greeting('Hai ' . $this->user->name . ',')
            ->line('Kami melihat Anda memulai proses pendaftaran di ' . config('app.name') . ', namun kami belum menerima verifikasi akun Anda. Untuk mengaktifkan akun Anda sepenuhnya dan menyelami pengalaman ' . config('app.name') . ', silakan klik tautan di bawah untuk memverifikasi alamat email Anda:')
            ->action('Verifikasi Akun Saya', $this->verificationUrl)
            ->line('Untuk bantuan atau pertanyaan apa pun, cukup balas email ini dan saya akan dengan senang hati membantu.')
            ->salutation('Hormat kami, ' . config('app.name'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}

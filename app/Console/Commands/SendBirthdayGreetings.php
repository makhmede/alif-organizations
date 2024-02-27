<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use \Illuminate\Contracts\Mail\Mailable;


class SendBirthdayGreetings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-birthday-greetings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::whereMonth('birthday', now()->month)
            ->whereDay('birthday', now()->day)
            ->get();

        foreach ($users as $user) {
            Mail::to($user->email)->send(new SendBirthdayGreetings($user));
        }

        $this->info('Birthday greetings sent successfully!');
    }
}

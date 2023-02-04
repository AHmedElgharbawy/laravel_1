<?php

namespace App\Console\Commands;

use App\Mail\MailUser;
use \App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send a notify message to users every day';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $emails = User::pluck("email")->toArray();
        $data = ["title"=>"programming","lecture"=>"python"];
        foreach($emails as $email){
            Mail::To("ahmeddd@gmail.com")->send(new MailUser($data));
        }

    }
}
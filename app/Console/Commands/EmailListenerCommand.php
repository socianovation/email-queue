<?php namespace App\Console\Commands;

use Illuminate\Console\Command;

use Mookofe\Tail\Facades\Tail;

use Illuminate\Support\Facades\Mail;

class EmailListenerCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'email:listener';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run Email Listener.';

    private $data = [];


    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        echo '====== Start Listening Email Sending ======';
        Tail::listen('send-email', function ($message) {
            $this->data = json_decode($message, true);
            Mail::raw($this->data['content'], function($msg) { 
                $msg->to([$this->data['to']]); 
                $msg->from([$this->data['from']]); 
                $msg->subject($this->data['subject']);
            });

            echo "\r\nEmail has been sent to ".$this->data['to'];
        });
    }

}

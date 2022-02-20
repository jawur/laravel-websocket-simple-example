<?php

namespace App\Console\Commands;

use App\Events\WebsocketEvent;
use Illuminate\Console\Command;

class BroadcastMessageCommand extends Command
{
    protected $signature = 'broadcast:message {message}';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): void
    {
        broadcast(new WebsocketEvent($this->argument('message')));

        $this->line('Message sent');
    }
}

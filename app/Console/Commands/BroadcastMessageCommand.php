<?php

namespace App\Console\Commands;

use App\Message;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class BroadcastMessageCommand extends Command
{
    protected $signature = 'broadcast:message {body}';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $validator = Validator::make([
            'body' => $this->argument('body'),
        ], [
            'body' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            $this->error((string)$validator->getMessageBag());

            return;
        }

        Message::query()->create([
            'body' => $this->argument('body'),
        ]);

        $this->line('Message sent');
    }
}

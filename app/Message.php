<?php

namespace App;

use App\Events\WebsocketEvent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    protected $fillable = ['body'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        static::created(function ($message) {
            broadcast(new WebsocketEvent($message));
        });

        parent::boot();
    }
}

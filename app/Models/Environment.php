<?php

namespace App\Models;

use App\Traits\HasUuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Environment extends Model
{
    use HasFactory,
        HasUuidTrait;

    protected $fillable = [
        'uuid',
        'name',
    ];


    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }


    public function singleReceivedMessageValue(): float
    {
        return cache()->remember(
            "single_received_message_value_{$this->uuid}",
            now()->addHour(),
            fn() => 0.06
        );
    }

    public function singleSentMessageValue(): float
    {
        return cache()->remember(
            "single_sent_message_value_{$this->uuid}",
            now()->addHour(),
            fn() => 0.06
        );
    }
}

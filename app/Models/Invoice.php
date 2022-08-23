<?php

namespace App\Models;

use App\Services\Facades\MoneyService;
use App\Traits\HasUuidTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    use HasFactory,
        HasUuidTrait;

    protected $fillable = [
        'uuid',
        'pre_paid_received_messages',
        'post_paid_received_messages',
        'pre_paid_sent_messages',
        'post_paid_sent_messages',
    ];

    protected $casts = [
        'pre_paid_sent_messages' => 'integer',
        'post_paid_sent_messages' => 'integer',
        'pre_paid_received_messages' => 'integer',
        'post_paid_received_messages' => 'integer',
    ];

    protected $attributes = [
        'pre_paid_received_messages' => 0,
        'post_paid_received_messages' => 0,
        'pre_paid_sent_messages' => 0,
        'post_paid_sent_messages' => 0,
    ];


    public function totalReceivedMessages(): Attribute
    {
        return new Attribute(
            get: fn($value) => $this->pre_paid_received_messages + $this->post_paid_received_messages
        );
    }

    public function totalSentMessages(): Attribute
    {
        return new Attribute(
            get: fn($value) => $this->pre_paid_sent_messages + $this->post_paid_sent_messages
        );
    }

    // This works
//    public function totalValue(): Attribute
//    {
//        return new Attribute(
//            get: fn($value) => MoneyService::format(
//                value: $this->total_received_messages * $this->environment->singleReceivedMessageValue() +
//                $this->total_sent_messages * $this->environment->singleSentMessageValue()
//            )
//        );
//    }

    // This dont
    public function totalValue(): Attribute
    {
        $receivedMessages = $this->total_received_messages * $this->environment->singleReceivedMessageValue();
        $sentMessages = $this->total_sent_messages * $this->environment->singleSentMessageValue();

        return new Attribute(
            get: fn($value) => MoneyService::format(
                value: $receivedMessages + $sentMessages
            )
        );
    }


    public function environment(): BelongsTo
    {
        return $this->belongsTo(Environment::class);
    }
}

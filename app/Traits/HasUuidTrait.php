<?php

namespace App\Traits;

use Ramsey\Uuid\Uuid;

trait HasUuidTrait
{
    protected static function bootHasUuidTrait()
    {
        static::creating(function ($model) {
            if (!$model->uuid) $model->uuid = (string)Uuid::uuid4();
        });
    }

    public static function findByUuidOrFail($uuid)
    {
        return self::whereUuid($uuid)->firstOrFail();
    }

    public function scopeWhereUuid($query, $uuid)
    {
        return $query->where('uuid', $uuid);
    }

    public function scopeWhereUuids($query, Array $uuids)
    {
        return $query->whereIn('uuid', $uuids);
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }
}

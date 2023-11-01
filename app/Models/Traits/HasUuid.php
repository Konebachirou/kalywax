<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;





trait HasUuid
{
    public static function booted()
    {
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }
}
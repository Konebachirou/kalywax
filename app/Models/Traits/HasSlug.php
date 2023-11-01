<?php
namespace App\Models\Traits;

use Illuminate\Support\Str;


trait HasSlug
{
    public static function bootHasSlug()
    {
        static::creating(function ($model) {
            $model->slug = Str::slug($model->name ?? $model->title);
        });
    }
}
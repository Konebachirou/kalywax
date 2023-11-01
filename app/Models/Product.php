<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Models\Traits\HasSlug;
use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Product extends Model
{
    use HasFactory, HasSlug, HasUuid;
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function commandeLine(): HasMany
    {
        return $this->hasMany(CommandeLine::class);
    }
}

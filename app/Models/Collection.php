<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Models\Traits\HasSlug;
use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Collection extends Model
{
    use HasFactory, HasSlug, HasUuid;

    protected $guarded = ['id'];



    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}

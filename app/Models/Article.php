<?php

namespace App\Models;

use App\Models\Traits\HasSlug;
use App\Models\Traits\HasUuid;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory, HasSlug, HasUuid;
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}

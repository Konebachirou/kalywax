<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slide extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function imageUrl(): string
    {
        return Storage::url($this->image);
    }
}

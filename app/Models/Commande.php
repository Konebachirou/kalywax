<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Commande extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'number_commande'];

    public function commandeLines(): HasMany
    {
        return $this->hasMany(CommandeLine::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

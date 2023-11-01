<?php

namespace App\Filament\Resources\ProductResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ProductResource;
use App\Filament\Resources\Traits\HasRedirect;

class CreateProduct extends CreateRecord
{
    use HasRedirect;
    protected static string $resource = ProductResource::class;
}
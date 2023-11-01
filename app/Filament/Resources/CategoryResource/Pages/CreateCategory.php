<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\CategoryResource;
use App\Filament\Resources\Traits\HasRedirect;

class CreateCategory extends CreateRecord
{
    use HasRedirect;
    protected static string $resource = CategoryResource::class;
}
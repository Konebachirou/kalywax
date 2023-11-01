<?php

namespace App\Filament\Resources\CollectionResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\CollectionResource;
use App\Filament\Resources\Traits\HasRedirect;

class CreateCollection extends CreateRecord
{
    use HasRedirect;
    protected static string $resource = CollectionResource::class;
}
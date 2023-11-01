<?php

namespace App\Filament\Resources\CollectionResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\CollectionResource;
use App\Filament\Resources\Traits\HasRedirect;

class EditCollection extends EditRecord
{
    use HasRedirect;
    protected static string $resource = CollectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
<?php

namespace App\Filament\Resources\ProductResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ProductResource;
use App\Filament\Resources\Traits\HasRedirect;

class EditProduct extends EditRecord
{
    use HasRedirect;
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
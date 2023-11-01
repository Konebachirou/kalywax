<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\CategoryResource;
use App\Filament\Resources\Traits\HasRedirect;

class EditCategory extends EditRecord
{
    use HasRedirect;
    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
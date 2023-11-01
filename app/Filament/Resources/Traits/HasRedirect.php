<?php

namespace App\Filament\Resources\Traits;

trait HasRedirect
{
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
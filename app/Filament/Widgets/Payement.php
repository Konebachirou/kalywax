<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\PayementResource;
use Filament\Widgets\TableWidget as BaseWidget;

class Payement extends BaseWidget
{
    protected static ?int $sort = 3;
    protected static ?string $heading = 'Payements';
    protected int| String | array $columnSpan = 'full';
    public function table(Table $table): Table
    {
        return $table
            ->query(
                PayementResource::getEloquentQuery()
            )
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('user.name')
                    ->label('Utilisateur')
                    ->sortable(),
                TextColumn::make('titular')
                    ->searchable(),
                TextColumn::make('number')
                    ->searchable(),
                TextColumn::make('date')
                    ->searchable(),
                TextColumn::make('cryptogramme')
                    ->searchable(),
            ]);
    }
}

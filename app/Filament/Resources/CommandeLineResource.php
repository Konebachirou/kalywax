<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\CommandeLine;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CommandeLineResource\Pages;
use App\Filament\Resources\CommandeLineResource\RelationManagers;

class CommandeLineResource extends Resource
{
    protected static ?string $model = CommandeLine::class;
    protected static ?string $navigationGroup = 'Commandes et Panier';
    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $label = "Ligne de commandes ";

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('product.image_1'),
                TextColumn::make('commande.number_commande')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('quantite')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('size')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageCommandeLines::route('/'),
        ];
    }
}
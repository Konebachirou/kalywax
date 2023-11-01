<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Commande;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Infolists\Components\Grid;
use Filament\Tables\Columns\TextColumn;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\Split;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use App\Filament\Resources\CommandeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CommandeResource\RelationManagers;

class CommandeResource extends Resource
{
    protected static ?string $model = Commande::class;
    protected static ?string $navigationGroup = 'Commandes et Panier';
    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?string $label = "Commandes";
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make()
                    ->schema([
                        Split::make([
                            Grid::make(3)
                                ->schema([
                                    Group::make(
                                        [

                                            TextEntry::make('user.name')
                                                ->hiddenLabel(),
                                            TextEntry::make('country'),
                                            TextEntry::make('address'),
                                            TextEntry::make('tel'),

                                        ]
                                    ),

                                    TextEntry::make('number_commande'),
                                    TextEntry::make('price_ttc'),
                                ])
                        ]),


                    ])




            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Utilisateur')
                    ->sortable(),
                TextColumn::make('number_commande')
                    ->searchable(),
                TextColumn::make('address')
                    ->searchable(),
                ToggleColumn::make('status')
                    ->label('Status'),
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
            'index' => Pages\ManageCommandes::route('/'),
        ];
    }
}

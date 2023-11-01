<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProductResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProductResource\RelationManagers;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationGroup = 'Shop';
    protected static ?string $navigationIcon = 'heroicon-o-bolt';

    protected static ?string $navigationLabel = 'Produits';
    protected static ?string $label = "Produits";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('category_id')
                    ->label('Categorie')
                    ->required()
                    ->options(\App\Models\Category::pluck('name', 'id')),
                Select::make('collection_id')
                    ->label('Collection')
                    ->required()
                    ->options(\App\Models\Collection::pluck('name', 'id')),
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                RichEditor::make('description'),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                TextInput::make('size')
                    ->maxLength(255),
                TextInput::make('quantity')
                    ->required()
                    ->numeric(),
                Toggle::make('is_in_stock')
                    ->required(),
                FileUpload::make('image_1')
                    ->image()
                    ->required(),
                FileUpload::make('image_2')
                    ->image()
                    ->required(),
                FileUpload::make('image_3')
                    ->image()
                    ->required(),
                Toggle::make('status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('category.name')->label('Categorie')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('collection.name')->label('Collection')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('price')
                    ->money()
                    ->sortable(),
                TextColumn::make('size')
                    ->searchable(),
                TextColumn::make('quantity')
                    ->numeric()
                    ->sortable(),
                ToggleColumn::make('is_in_stock')
                    ->label('Stock'),
                ImageColumn::make('image_1'),
                ImageColumn::make('image_2'),
                ImageColumn::make('image_3'),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}

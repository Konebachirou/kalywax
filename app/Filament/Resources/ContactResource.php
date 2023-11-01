<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Contact;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Mail\NotifyContact;
use Filament\Tables\Actions\Action;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Mail;
use Filament\Infolists\Components\Grid;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\Split;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use App\Filament\Resources\ContactResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ContactResource\RelationManagers;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationGroup = 'Communication et Contacts';
    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make()
                    ->schema([
                        Split::make([
                            Grid::make(2)
                                ->schema([
                                    Group::make(
                                        [

                                            TextEntry::make('fullName')
                                                ->hiddenLabel(),
                                            TextEntry::make('email'),

                                        ]
                                    ),

                                    TextEntry::make('subject'),
                                ])
                        ]),
                        Section::make('content')
                            ->schema([
                                TextEntry::make('message')
                                    ->prose()
                                    ->markdown()
                                    ->hiddenLabel(),
                            ])
                            ->collapsible(),

                    ])




            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('fullName')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('subject')
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
                Action::make('sendEmail')
                    ->label('Repondre au message')
                    ->icon('heroicon-o-envelope')
                    ->modalHeading('Envoi de mail')
                    ->form([
                        TextInput::make('subject')->required(),
                        RichEditor::make('body')->required(),
                    ])
                    ->action(function (array $data, Contact $contact) {
                        Mail::to($contact->email)->send(new NotifyContact($data['subject'], $data['body']));
                        return redirect()->back()->with('success', 'Message envoyé');
                    }),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}

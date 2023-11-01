<?php

namespace App\Filament\Resources\NewsletterSubscriberResource\Pages;

use Filament\Actions;
use App\Mail\sendNewsletter;
use Filament\Actions\Action;
use App\Models\NewsletterSubscriber;
use Illuminate\Support\Facades\Mail;
use Filament\Notifications\Notification;
use Filament\Forms\Components\RichEditor;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\NewsletterSubscriberResource;

class ListNewsletterSubscribers extends ListRecords
{
    protected static string $resource = NewsletterSubscriberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('approuve')
                ->label('Creer une newsletter')
                ->icon('heroicon-o-envelope')
                ->modalHeading('Creation de newletter')
                ->form([
                    RichEditor::make('message')
                        ->label('Contenu')
                        ->required(),
                ])->action(function (array $data): void {
                    $subscribers = NewsletterSubscriber::select('email')->where('is_active', 1)->get();
                    if ($subscribers->count() > 0) {
                        foreach ($subscribers as $subscriber) {
                            Mail::to($subscriber->email)->send(new sendNewsletter($data['message'], $subscriber->email));
                        }
                    } else {
                        Notification::make()->info()->title('Aucun abonné')->body('Aucun abonné pour le moment')->send();
                        return;
                    }

                    Notification::make()->success()->title('Newsletter envoyé')->body('La newsletter a été envoyé avec succès')->send();
                    return;
                }),
        ];
    }
}
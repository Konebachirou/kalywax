<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\Commande;
use Filament\Widgets\ChartWidget;

class CommandeChart extends ChartWidget
{
    protected static ?string $heading = 'Commandes crées par mois';
    protected static ?int $sort = 3;
    protected static string $color = 'info';
    protected int| String | array $columnSpan = 'full';
    protected function getData(): array
    {
        $data = $this->getCommandesPerMonth();
        return [
            'datasets' => [
                [
                    'label' => 'Commandes',
                    'data' => $data['commandesPerMonth']
                ]
            ],
            'labels' => $data['months']
        ];
    }

    private function getCommandesPerMonth(): array
    {
        $commandesPerMonth = [];
        $months = collect(range(1, 12))->map(function ($month) use (&$commandesPerMonth) {
            $count = Commande::whereRaw("MONTH(created_at) = ?", [$month])
                ->count();
            $commandesPerMonth[] = $count;
            return Carbon::now()->month($month)->format('M');
        })->toArray();

        return [
            'commandesPerMonth' => $commandesPerMonth,
            'months' => $months
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}

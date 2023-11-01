<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\Article;
use Filament\Widgets\ChartWidget;

class ArticleChart extends ChartWidget
{
    protected static ?string $heading = 'Article crées par mois';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $data = $this->getArticlesPerMonth();

        return [
            'datasets' => [
                [
                    'label' => 'Articles',
                    'data' => $data['articlesPerMonth']
                ]
            ],
            'labels' => $data['months']
        ];
    }

    private function getArticlesPerMonth(): array
    {
        $articlesPerMonth = [];
        $months = collect(range(1, 12))->map(function ($month) use (&$articlesPerMonth) {
            $count = Article::whereRaw("MONTH(created_at) = ?", [$month])
                ->count();
            $articlesPerMonth[] = $count;
            return Carbon::now()->month($month)->format('M');
        })->toArray();

        return [
            'articlesPerMonth' => $articlesPerMonth,
            'months' => $months
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}

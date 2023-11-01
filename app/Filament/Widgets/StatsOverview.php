<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use App\Models\Product;
use App\Models\Category;
use App\Models\Collection;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;
    protected static ?string $pollingInterval = '15s';

    protected static bool $isLazy = true;
    protected function getStats(): array
    {
        return [
            Stat::make('Total Categories', Category::count())
                ->description('Categories')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([7, 3, 4, 5, 6, 3, 5, 4, 6, 7, 8, 9, 10, 11, 12, 11, 10, 9, 8, 7]),
            Stat::make('Total Collections', Collection::count())
                ->description('Collections ')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([7, 3, 4, 5, 6, 3, 5, 4, 6, 7, 8, 9, 10, 11, 12, 11, 10, 9, 8, 7]),
            Stat::make('Total Produits', Product::count())
                ->description('Produits')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([7, 3, 4, 5, 6, 3, 5, 4, 6, 7, 8, 9, 10, 11, 12, 11, 10, 9, 8, 7]),
            Stat::make('Total Article', Article::count())
                ->description('Article de blog')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([7, 3, 4, 5, 6, 3, 5, 4, 6, 7, 8, 9, 10, 11, 12, 11, 10, 9, 8, 7]),


        ];
    }
}

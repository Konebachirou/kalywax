<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\Product;
use Filament\Widgets\ChartWidget;

class ProductChart extends ChartWidget
{

    protected static ?string $heading = 'Produits crées par mois';
    protected static ?int $sort = 2;
    protected static string $color = 'gray';
    protected function getData(): array
    {
        $data = $this->getProductsPerMonth();
        return [
            'datasets' => [
                [
                    'label' => 'Products',
                    'data' => $data['productsPerMonth']
                ]
            ],
            'labels' => $data['months']
        ];
    }
    private function getProductsPerMonth(): array
    {
        $productsPerMonth = [];
        $months = collect(range(1, 12))->map(function ($month) use (&$productsPerMonth) {
            $count = Product::whereRaw("MONTH(created_at) = ?", [$month])
                ->count();
            $productsPerMonth[] = $count;
            return Carbon::now()->month($month)->format('M');
        })->toArray();

        return [
            'productsPerMonth' => $productsPerMonth,
            'months' => $months
        ];
    }
    protected function getType(): string
    {
        return 'bar';
    }
}

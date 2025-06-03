<?php
namespace App\Filament\Admin1\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Resep;

class ResepBawangChart extends ChartWidget
{
    protected static ?string $heading = 'Statistik Resep Bawang';

    protected function getData(): array
    {
        $jumlahBawang = Resep::where('bahan', 'like', '%bawang%')->count();
        $jumlahNonBawang = Resep::where('bahan', 'not like', '%bawang%')->count();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Resep',
                    'data' => [$jumlahBawang, $jumlahNonBawang],
                    'backgroundColor' => ['#f59e42', '#f87171'],
                ],
            ],
            'labels' => ['Mengandung Bawang', 'Tanpa Bawang'],
        ];
    }

    protected function getType(): string
    {
        return 'pie'; // atau 'bar', 'doughnut', dll
    }
}
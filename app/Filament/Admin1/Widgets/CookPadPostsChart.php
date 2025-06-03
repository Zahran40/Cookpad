<?php

namespace App\Filament\Admin1\Widgets;
use App\Models\Resep;

use Filament\Widgets\ChartWidget;

class CookPadPostsChart extends ChartWidget
{
    protected static ?string $heading = 'Statistik Waktu Pembuatan Resep';

    protected function getData(): array
    {
            $jumlah30 = Resep::where('waktu_pembuatan', '30menit')->count();
        $jumlah1jam = Resep::where('waktu_pembuatan', '1jam')->count();
        $jumlah45 = Resep::where('waktu_pembuatan', '45menit')->count();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Resep',
                    'data' => [$jumlah30, $jumlah1jam, $jumlah45],
                    'backgroundColor' => ['#f59e42', '#fbbf24', '#f87171'],
                ],
            ],
            'labels' => ['30 Menit', '1 Jam', '45 menit'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}

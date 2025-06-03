<?php

namespace App\Filament\Admin1\Widgets;
use App\Models\Resep;

use Filament\Widgets\ChartWidget;

class CookPadPostsChart extends ChartWidget
{
    protected static ?string $heading = 'Statistik Waktu Pembuatan Resep';

    
protected function getData(): array
{


//     SELECT
//     SUM(LOWER(waktu_pembuatan) = '10 menit') AS jumlah10,
//     SUM(LOWER(waktu_pembuatan) = '30 menit') AS jumlah30,
//     SUM(LOWER(waktu_pembuatan) = '45 menit') AS jumlah45,
//     SUM(LOWER(waktu_pembuatan) = '1 jam') AS jumlah1jam,
//     SUM(LOWER(waktu_pembuatan) = '15 menit') AS jumlah15,
//     SUM(
//         waktu_pembuatan IS NULL OR
//         waktu_pembuatan = '' OR
//         LOWER(waktu_pembuatan) = 'tidak disebutkan'
//     ) AS jumlahTidakDisebutkan
// FROM resep;

    $jumlah10 = Resep::where('waktu_pembuatan', '10 menit')->count();
    $jumlah30 = Resep::where('waktu_pembuatan', '30 menit')->count();
    $jumlah1jam = Resep::where('waktu_pembuatan', '1 jam')->count();
    $jumlah15 = Resep::where('waktu_pembuatan', '15 menit')->count();
    $jumlah45 = Resep::where('waktu_pembuatan', '45 menit')->count();
    $jumlahTidakDisebutkan = Resep::whereNull('waktu_pembuatan')
        ->orWhere('waktu_pembuatan', '')
        ->orWhere('waktu_pembuatan', 'tidak disebutkan')
        ->count();

    return [
        'datasets' => [
            [
                'label' => 'Jumlah Resep',
                'data' => [
                    $jumlah10,
                    $jumlah30,
                    $jumlah45,
                    $jumlah1jam,
                    $jumlah15,
                    $jumlahTidakDisebutkan
                ],
                'backgroundColor' => [
                    '#a3e635', // 10 menit
                    '#f59e42', // 30 menit
                    '#f87171', // 45 menit
                    '#fbbf24', // 1 jam
                    '#38bdf8', // 1 jam 30 menit
                    '#a1a1aa', // tidak disebutkan
                ],
            ],
        ],
        'labels' => [
            '10 Menit',
            '30 Menit',
            '45 Menit',
            '1 Jam',
            '15 menit',
            'Tidak Disebutkan'
        ],
    ];
}

    protected function getType(): string
    {
        return 'bar';
    }
}

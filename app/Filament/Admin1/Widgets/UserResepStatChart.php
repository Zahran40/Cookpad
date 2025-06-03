<?php
// File: app/Filament/Admin1/Widgets/ResepLangkahChart.php

namespace App\Filament\Admin1\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\User;
use App\Models\Resep;
use Illuminate\Support\Facades\DB;

class UserResepStatChart extends ChartWidget
{
    protected static ?string $heading = 'Statistik Jumlah User Berdasarkan Banyak Resep yang Dibuat';

    protected function getData(): array
    {
        // Ambil jumlah resep per user, lalu hitung berapa user untuk setiap jumlah resep
//         SELECT
//     jumlah_resep,
//     COUNT(*) AS jumlah_user
// FROM (
//     SELECT
//         id_pembuat,
//         COUNT(*) AS jumlah_resep
//     FROM resep
//     GROUP BY id_pembuat
// ) AS resep_per_user
// GROUP BY jumlah_resep
// ORDER BY jumlah_resep;
        $data = Resep::select('id_pembuat', DB::raw('COUNT(*) as jumlah_resep'))
            ->groupBy('id_pembuat')
            ->pluck('jumlah_resep')
            ->toArray();

        // Hitung distribusi: [jumlah_resep => jumlah_user]
        $distribusi = [];
        foreach ($data as $jumlah) {
            if (!isset($distribusi[$jumlah])) {
                $distribusi[$jumlah] = 0;
            }
            $distribusi[$jumlah]++;
        }
        ksort($distribusi);

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah User',
                    'data' => array_values($distribusi),
                    'backgroundColor' => '#38bdf8',
                ],
            ],
            'labels' => array_map(fn($n) => $n . ' Resep', array_keys($distribusi)),
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // atau 'pie', 'doughnut', dll
    }
}
<?php


namespace App\Filament\Admin1\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Resep;

class ResepLangkahChart extends ChartWidget
{
    protected static ?string $heading = 'Statistik Jumlah Langkah per Resep';

    protected function getData(): array
    {
        $jumlahLangkah = [];

//         SELECT
//     jumlah_langkah,
//     COUNT(*) AS jumlah_resep
// FROM (
//     SELECT
//         id,
//         -- Hitung jumlah baris (langkah) pada kolom langkah
//         LENGTH(TRIM(REPLACE(REPLACE(REPLACE(langkah, '\r\n', '\n'), '\r', '\n'), '\n', '\n'))) 
//         - LENGTH(REPLACE(TRIM(REPLACE(REPLACE(REPLACE(langkah, '\r\n', '\n'), '\r', '\n'), '\n', '\n')), '\n', '')) + 1
//         AS jumlah_langkah
//     FROM resep
//     WHERE langkah IS NOT NULL AND langkah != ''
// ) AS langkah_count
// GROUP BY jumlah_langkah
// ORDER BY jumlah_langkah;

        Resep::select('langkah')->get()->each(function ($resep) use (&$jumlahLangkah) {
            // Hitung jumlah langkah (asumsi dipisah baris baru)
            $count = count(array_filter(preg_split('/\r\n|\r|\n/', $resep->langkah)));
            if ($count > 0) {
                if (!isset($jumlahLangkah[$count])) {
                    $jumlahLangkah[$count] = 0;
                }
                $jumlahLangkah[$count]++;
            }
        });

        ksort($jumlahLangkah);

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Resep',
                    'data' => array_values($jumlahLangkah),
                    'backgroundColor' => '#38bdf8',
                ],
            ],
            'labels' => array_map(fn($n) => $n . ' langkah', array_keys($jumlahLangkah)),
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // Bisa diganti 'pie', 'doughnut', dll
    }
}
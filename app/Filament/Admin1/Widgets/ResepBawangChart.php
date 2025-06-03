<?php

namespace App\Filament\Admin1\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Resep;

class ResepBawangChart extends ChartWidget
{
    protected static ?string $heading = 'Statistik Penggunaan Bahan dalam Resep';

    protected function getData(): array
    {
        $bahanList = [
            'papan tempe',
            'tahu',
            'bawang merah',
            'bawang putih',
            'cabe merah',
            'daun salam',
            'santan',
            'garam',
            'gula',
            'air',
            'tempe busuk',
            'tempe semangit',
            'kencur',
            'ketumbar',
            'daun jeruk',
            'daun kunyit',
            'kacang tanah',
            'kemanggi',
            'tahu putih',
            'lengkuas',
            'daun bawang',
            'tepung terigu',
            'tepung beras',
            'telur ayam rebus',
            'sambel penyet',
            'cabe besar',
            'minyak goreng',
        ];

        $labels = [];
        $data = [];

//         SELECT
//     SUM(bahan LIKE '%papan tempe%') AS papan_tempe,
//     SUM(bahan LIKE '%tahu%') AS tahu,
//     SUM(bahan LIKE '%bawang merah%') AS bawang_merah,
//     SUM(bahan LIKE '%bawang putih%') AS bawang_putih,
//     SUM(bahan LIKE '%cabe merah%') AS cabe_merah,
//     SUM(bahan LIKE '%daun salam%') AS daun_salam,
//     SUM(bahan LIKE '%santan%') AS santan,
//     SUM(bahan LIKE '%garam%') AS garam,
//     SUM(bahan LIKE '%gula%') AS gula,
//     SUM(bahan LIKE '%air%') AS air,
//     SUM(bahan LIKE '%tempe busuk%') + SUM(bahan LIKE '%tempe semangit%') AS tempe_busuk_semangit,
//     SUM(bahan LIKE '%kencur%') AS kencur,
//     SUM(bahan LIKE '%ketumbar%') AS ketumbar,
//     SUM(bahan LIKE '%daun jeruk%') AS daun_jeruk,
//     SUM(bahan LIKE '%daun kunyit%') AS daun_kunyit,
//     SUM(bahan LIKE '%kacang tanah%') AS kacang_tanah,
//     SUM(bahan LIKE '%kemanggi%') AS kemanggi,
//     SUM(bahan LIKE '%tahu putih%') AS tahu_putih,
//     SUM(bahan LIKE '%lengkuas%') AS lengkuas,
//     SUM(bahan LIKE '%daun bawang%') AS daun_bawang,
//     SUM(bahan LIKE '%tepung terigu%') AS tepung_terigu,
//     SUM(bahan LIKE '%tepung beras%') AS tepung_beras,
//     SUM(bahan LIKE '%telur ayam rebus%') AS telur_ayam_rebus,
//     SUM(bahan LIKE '%sambel penyet%') AS sambel_penyet,
//     SUM(bahan LIKE '%cabe besar%') AS cabe_besar,
//     SUM(bahan LIKE '%minyak goreng%') AS minyak_goreng
// FROM resep;

        foreach ($bahanList as $bahan) {
            $count = Resep::where('bahan', 'like', '%' . $bahan . '%')->count();
            $labels[] = ucfirst($bahan);
            $data[] = $count;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Resep',
                    'data' => $data,
                    'backgroundColor' => [
                        '#f59e42', '#f87171', '#a3e635', '#38bdf8', '#fbbf24', '#a1a1aa', '#f472b6', '#34d399',
                        '#fca5a5', '#818cf8', '#fde68a', '#fcd34d', '#f9fafb', '#facc15', '#bbf7d0', '#fef3c7',
                        '#f3e8ff', '#f9a8d4', '#fef08a', '#fca5a5', '#a7f3d0', '#f3f4f6', '#f87171', '#fbbf24',
                        '#f472b6', '#f59e42', '#fcd34d'
                    ],
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'pie'; // atau 'pie', 'doughnut', dll
    }
}
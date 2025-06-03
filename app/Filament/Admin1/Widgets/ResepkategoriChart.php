<?php


namespace App\Filament\Admin1\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Resep;

class ResepKategoriChart extends ChartWidget
{
    protected static ?string $heading = 'Statistik Resep per Kategori';

    protected function getData(): array
    {
        // Daftar kategori yang ingin ditampilkan
        $kategori = [
            'Ayam',
            'Cumi',
            'Daging',
            'Kambing',
            'Kentang',
            'Mie',
            'Sayur',
            'Tahu',
            'Telur',
            'Udang',
            'Tempe',
        ];

        $data = [];
        // SELECT
//     SUM(LOWER(nama_resep) LIKE '%ayam%') AS Ayam,
//     SUM(LOWER(nama_resep) LIKE '%cumi%') AS Cumi,
//     SUM(LOWER(nama_resep) LIKE '%daging%') AS Daging,
//     SUM(LOWER(nama_resep) LIKE '%kambing%') AS Kambing,
//     SUM(LOWER(nama_resep) LIKE '%kentang%') AS Kentang,
//     SUM(LOWER(nama_resep) LIKE '%mie%') AS Mie,
//     SUM(LOWER(nama_resep) LIKE '%sayur%') AS Sayur,
//     SUM(LOWER(nama_resep) LIKE '%tahu%') AS Tahu,
//     SUM(LOWER(nama_resep) LIKE '%telur%') AS Telur,
//     SUM(LOWER(nama_resep) LIKE '%udang%') AS Udang,
//     SUM(LOWER(nama_resep) LIKE '%tempe%') AS Tempe
// FROM resep;
        foreach ($kategori as $namaKategori) {
            $data[] = Resep::where('nama_resep', 'like', '%' . strtolower($namaKategori) . '%')->count();
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Resep',
                    'data' => $data,
                    'backgroundColor' => [
                        '#f59e42', '#fbbf24', '#f87171', '#34d399', '#60a5fa',
                        '#a78bfa', '#f472b6', '#facc15', '#4ade80', '#38bdf8', '#f87171'
                    ],
                ],
            ],
            'labels' => $kategori,
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // atau 'pie', 'doughnut', dll
    }
}
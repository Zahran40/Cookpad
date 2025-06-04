<?php

namespace App\Filament\Admin1\Resources\ResepResource\Pages;

use App\Filament\Admin1\Resources\ResepResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditResep extends EditRecord
{

//     SELECT *
// FROM resep
// WHERE id = {id_resep}
// LIMIT 1;
    protected static string $resource = ResepResource::class;

    protected function getHeaderActions(): array
    {

//         UPDATE resep
// SET
//     nama_resep = '{nama_resep}',
//     deskripsi = '{deskripsi}',
//     bahan = '{bahan}',
//     langkah = '{langkah}',
//     waktu_pembuatan = '{waktu_pembuatan}',
//     gambar_resep = '{gambar_resep}',
//     id_pembuat = {id_pembuat},
//     status = '{status}',
//     id_kategori = {id_kategori}
// WHERE id = {id_resep};
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

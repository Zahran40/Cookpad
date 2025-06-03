<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KoleksiResep;
use App\Models\User;
use App\Models\Resep;
use Illuminate\Support\Facades\Auth;

class KoleksiResepController extends Controller
{
    public function simpan(Request $request, $id)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Cek apakah resep sudah ada di koleksi
//         SELECT COUNT(*) FROM koleksi_resep
// WHERE id_pembuat = USER_ID
//   AND resep_id = RESEP_ID;
        $exists = KoleksiResep::where('id_pembuat', $user->id_pembuat)
            ->where('resep_id', $id)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Resep sudah ada di koleksi Anda.');
        }

        // Simpan ke koleksi
//         INSERT INTO koleksi_resep (id_pembuat, resep_id, created_at, updated_at)
// VALUES (USER_ID, RESEP_ID, NOW(), NOW());
        KoleksiResep::create([
            'id_pembuat' => $user->id_pembuat,
            'resep_id' => $id,
        ]);


        return redirect()->back()->with('success', 'Resep berhasil disimpan ke koleksi Anda.');
    }
   

public function koleksiSaya()
{
    $user = Auth::user();
    if (!$user) {
        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
    }

    // Ambil koleksi resep user
//     SELECT r.*
// FROM koleksi_resep k
// JOIN resep r ON k.resep_id = r.id
// WHERE k.id_pembuat = USER_ID;
    $reseps = KoleksiResep::where('id_pembuat', $user->id_pembuat)
        ->with('resep')
        ->get()
        ->pluck('resep'); // Ambil objek resep-nya saja

    return view('koleksi', compact('reseps'));
}

 
public function hapus($id)
{
    $user = Auth::user();
//     DELETE FROM koleksi_resep
// WHERE id_pembuat = USER_ID
//   AND resep_id =
    \App\Models\KoleksiResep::where('id_pembuat', $user->id_pembuat)
        ->where('resep_id', $id)
        ->delete();

    return redirect()->back()->with('success', 'Resep dihapus dari koleksi.');
}
}
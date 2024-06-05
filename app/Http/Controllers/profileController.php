<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class profileController extends Controller
{
    //
    function index()
    {
        $regionUrl = public_path('Admin/regions.json');
        $regionData = file_get_contents($regionUrl);
        $regionData = json_decode($regionData, true);


        return view('dashboard.profile.index')->with(['regions' => $regionData]);
    }
    function update(Request $request){
        $request->validate([
            'curiculumV' => 'mimes:pdf',
            'foto' => 'mimes:jpeg,jpg,png,gif, JPG',
            'email' => 'required|email',
        ], [
            'foto.mimes' => 'Foto harus berformat jpeg, jpg, png, atau gif',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Format email tidak valid',
            'curiculumV.mimes' => 'Curriculum Vitae harus berformat pdf',
        ]);

        // Memproses file foto jika ada
        if ($request->hasFile('foto')) {
            $foto_file = $request->file('foto');
            $foto_ekstensi = strtolower($foto_file->extension());
            $foto_baru = date('ymdhis') . ".$foto_ekstensi";
            $foto_file->move(public_path('foto'), $foto_baru);

            $fotoOld = get_meta_value('foto');
            File::delete(public_path('foto'."/".$fotoOld));
            metadata::updateOrCreate(['meta_key' => 'foto'], ['meta_value' => $foto_baru]);
        }
        if ($request->hasFile('curiculumV')) {
           $cvFile = $request->file('curiculumV');
           $cvEkstensi = strtolower($cvFile->extension());
           $cvBaru = date('ymdhis') . ".$cvEkstensi";
           $cvFile->move(public_path('cv'), $cvBaru);

           $cvOld = get_meta_value('cv');
           File::delete(public_path('cv'."/".$cvOld));
           metadata::updateOrCreate(['meta_key' => 'cv'], ['meta_value' => $cvBaru]);
        }
        // Memperbarui email di metadata
        metadata::updateOrCreate(['meta_key' => 'email'], ['meta_value' => $request->email]);
        metadata::updateOrCreate(['meta_key' => 'telp'], ['meta_value' => $request->telp]);

        metadata::updateOrCreate(['meta_key' => 'ttl'], ['meta_value' => $request->ttl]);

        metadata::updateOrCreate(['meta_key' => 'provinsi'], ['meta_value' => $request->provinsi]);
        metadata::updateOrCreate(['meta_key' => 'kota'], ['meta_value' => $request->kota]);

        metadata::updateOrCreate(['meta_key' => 'instagram'], ['meta_value' => $request->instagram]);
        metadata::updateOrCreate(['meta_key' => 'linkedin'], ['meta_value' => $request->linkedin]);
        metadata::updateOrCreate(['meta_key' => 'twitter'], ['meta_value' => $request->twitter]);
        metadata::updateOrCreate(['meta_key' => 'github'], ['meta_value' => $request->github]);


        // Redirect ke halaman profile dengan pesan sukses
        return redirect()->route('profile.index')->with('success', 'Berhasil menambahkan');
    }
    public function showCV()
    {
        // Ambil nama file CV dari metadata
        $cvName = get_meta_value('cv');

        // Cek apakah CV ada
        if (!$cvName) {
            // Jika CV tidak ditemukan, kembalikan respons 404 Not Found
            abort(404);
        }

        // Ambil path lengkap file CV
        $cvPath = public_path('cv/' . $cvName);

        // Cek apakah file CV ada di penyimpanan
        if (!file_exists($cvPath)) {
            // Jika file tidak ditemukan, kembalikan respons 404 Not Found
            abort(404);
        }

        // Kembalikan file CV sebagai respons
        return response()->file($cvPath);
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\halaman;
use App\Models\metadata;
use Illuminate\Http\Request;

class settinghalamanController extends Controller
{
    //
    function index()
    {
        $dataHalaman = halaman::orderBy('judul', 'asc')->get();
        return view('dashboard.setting.index')->with('datahalaman', $dataHalaman);
    }
    function update(Request $request){

        metadata::updateOrCreate(['meta_key' => 'halaman_about'], ['meta_value' => $request->halamanabout]);
        metadata::updateOrCreate(['meta_key' => 'halaman_interest'], ['meta_value' => $request->halamaninterest]);
        metadata::updateOrCreate(['meta_key' => 'halaman_award'], ['meta_value' => $request->halamanaward]);
        metadata::updateOrCreate(['meta_key' => 'halaman_contact'], ['meta_value' => $request->halamancontact]);
        // Redirect ke halaman profile dengan pesan sukses
        return redirect()->route('setting.index')->with('success', 'Berhasil menambahkan');
    }
}

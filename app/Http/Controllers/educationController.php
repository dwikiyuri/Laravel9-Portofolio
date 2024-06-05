<?php

namespace App\Http\Controllers;

use App\Models\riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class educationController extends Controller
{
    public $_type;
    function __construct()
    {
        $this->_type = 'education';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = riwayat::where('tipe', $this->_type)->orderBy('tanggalakhir','desc')->get();
        $title = 'Delete Item!';
        $text = 'Are you sure you want to delete this item?';
        return view('dashboard.education.index',compact('data', 'title', 'text'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.education.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Session::flash('judul', $request->judul);
        Session::flash('info1', $request->info1);
        Session::flash('info2', $request->info1);
        Session::flash('info3', $request->info1);
        Session::flash('tglmulai', $request->tglmulai);
        Session::flash('tglselesai', $request->tglselesai);
        $request ->validate(
            [
            'judul' => 'required',
            'info1' => 'required',
            'info2' => 'required',
            'info3' => 'required',
            'tanggalmulai' => 'required',
            'tanggalakhir' => $request->input('stillworking') == '1' ? '' : 'required|date|after_or_equal:tanggalmulai',

            ],
            [
                'judul.required' => 'Judul wajib diisi',
                'isi.required' => 'Isian tulisan wajib diisi',
                'info1.required' => 'Nama fakultas wajib diisi',
                'info2.required' => 'Nama prodi wajib diisi',
                'info3.required' => 'IPK wajib diisi',
                'tanggalmulai.required' => 'tanggal mulai bekerja wajib diisi',
                'tanggalakhir.required' => 'tanggal selesai wajib diisi',
                'tanggalakhir.after_or_equal' => 'Tanggal akhir harus setelah atau sama dengan tanggal mulai',
            ]
        );

        $data = [
            'judul' => $request->judul,
            'info1' => $request->info1,
            'info2' => $request->info2,
            'info3' => $request->info3,
            'tipe' => $this->_type,
            'tanggalmulai' => $request->tanggalmulai,
            'tanggalakhir' => $request->tanggalakhir,
            'still' => $request->stillworking
        ];

        riwayat::create($data);

        return redirect()->route('education.index')->with('success', 'Data pendidikan telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = riwayat::where('id',$id)->where('tipe', $this->_type)->first();
        return view('dashboard.education.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        Session::flash('judul', $request->judul);
        Session::flash('info1', $request->info1);
        Session::flash('info2', $request->info1);
        Session::flash('info3', $request->info1);
        Session::flash('tglmulai', $request->tglmulai);
        Session::flash('tglselesai', $request->tglselesai);


        $request ->validate(
            [
            'judul' => 'required',
            'info1' => 'required',
            'info2' => 'required',
            'info3' => 'required',
            'tanggalmulai' => 'required',
            'tanggalakhir' => $request->input('stillworking') == '1' ? '' : 'required|date|after_or_equal:tanggalmulai',

            ],
            [
                'judul.required' => 'Judul wajib diisi',
                'info1.required' => 'Nama fakultas wajib diisi',
                'info2.required' => 'Nama prodi wajib diisi',
                'info3.required' => 'IPK wajib diisi',
                'tanggalmulai.required' => 'tanggal mulai bekerja wajib diisi',
                'tanggalakhir.required' => 'tanggal selesai wajib diisi',
                'tanggalakhir.after_or_equal' => 'Tanggal akhir harus setelah atau sama dengan tanggal mulai',
            ]
        );

        $data = [
            'judul' => $request->judul,
            'info1' => $request->info1,
            'info2' => $request->info2,
            'info3' => $request->info3,
            'tipe' => $this->_type,
            'tanggalmulai' => $request->tanggalmulai,
            'tanggalakhir' => $request->tanggalakhir,
            'still' => $request->stillworking
        ];

       riwayat::where('id', $id)->update($data);

        return redirect()->route('education.index')->with('success', 'Data pengalaman telah di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        riwayat::where('id', $id)->where('tipe', $this->_type)->delete();
        return redirect()->route('education.index')->with('success', 'Berhasil mengapus Education');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class projectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = project::orderBy('nama_project','desc')->get();
        $title = 'Delete Item!';
        $text = 'Are you sure you want to delete this item?';
        return view('dashboard.project.index',compact('data', 'title', 'text'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = category::all();
        return view('dashboard.project.create',compact('category'));
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
        Session::flash('nama_project', $request->nama_project);
        Session::flash('keterangan', $request->keterangan);
        Session::flash('foto_project', $request->fotoproject);
        Session::flash('category', $request->category);
        Session::flash('link_github', $request->link_github);

        Session::flash('link_demo', $request->link_demo);
        Session::flash('category', $request->category);
        $request ->validate(
            [
            'nama_project' => 'required',
            'keterangan' => 'required',
            'foto_project' => 'required|mimes:jpeg,jpg,png,gif, JPG',
            'category_id' => 'required'

            ],
            [
                'nama_project.required' => 'Nama Project wajib diisi',
                'keterangan.required' => 'Keterangan wajib diisi',
                'foto_project.required' => 'Foto Project wajib diisi',
                'foto_project.mimes' => 'Foto harus berformat jpeg, jpg, png, atau gif',
                'category_id.required' => 'category harus diisi'
            ]
        );
        if ($request->hasFile('foto_project')) {
            $foto_file = $request->file('foto_project');
            $foto_ekstensi = strtolower($foto_file->extension());
            $foto_baru = date('ymdhis') . ".$foto_ekstensi";
            $foto_file->move(public_path('foto_project'), $foto_baru);
        }
        $data = [
            'fileproject' => $foto_baru,
            'nama_project' => $request->nama_project,
            'category_id' => $request->category_id,
            'link_github' => $request->link_github,
            'link_demo' => $request->link_demo,
            'keterangan' => $request->keterangan,

        ];
       project::create($data);

        return redirect()->route('project.index')->with('success', 'Data project telah ditambahkan');
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
       $data = Project::where('id', $id)->first();
       $category = category::all();
        return view('dashboard.project.edit', compact('data','category'));
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
        $request ->validate(
            [
            'nama_project' => 'required',
            'keterangan' => 'required',
            'foto_project' => 'required|mimes:jpeg,jpg,png,gif, JPG',
            'category_id' => 'required'

            ],
            [
                'nama_project.required' => 'Nama Project wajib diisi',
                'keterangan.required' => 'Keterangan wajib diisi',
                'foto_project.required' => 'Foto Project wajib diisi',
                'foto_project.mimes' => 'Foto harus berformat jpeg, jpg, png, atau gif',
                'category_id.required' => 'category harus diisi'
            ]
        );
        $project = Project::find($id);

        if ($request->hasFile('foto_project')) {
            $foto_file = $request->file('foto_project');
            $foto_ekstensi = strtolower($foto_file->extension());
            $foto_baru = date('ymdhis') . ".$foto_ekstensi";
            $foto_file->move(public_path('foto_project'), $foto_baru);

            // Hapus file lama jika ada
            $fileproject = $project->fileproject;

            $filePath = public_path('foto_project') . '/' . $fileproject;
            File::delete($filePath);
                // Hapus file jika ada


        }
        $data = [
            'fileproject' => $foto_baru,
            'nama_project' => $request->nama_project,
            'category_id' => $request->category_id,
            'link_github' => $request->link_github,
            'link_demo' => $request->link_demo,
            'keterangan' => $request->keterangan,

        ];
        project::where('id', $id)->update($data);

        return redirect()->route('project.index')->with('success', 'Data project telah diedit');

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
        $project = Project::find($id);
        $fileproject = $project->fileproject;

        if ($fileproject) {
            $filePath = public_path('foto_project') . '/' . $fileproject;

            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }


        $project->delete();

        return redirect()->route('project.index')->with('success', 'Data project telah dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use Illuminate\Http\Request;

class skillContoller extends Controller
{

    public function index()
    {
        //
        $skillurl = public_path('Admin\devicon.json');
        $skilldata = file_get_contents($skillurl);
       $skilldata = json_decode($skilldata,true);
       $skill = array_column($skilldata, 'name');
        $skill = "'".implode("','", $skill)."'";
        return view('dashboard.skill.index')->with(['skill' => $skill]);

    }
    public function update(Request $request)
    {
        //
        if($request->method()=='POST'){
            $request->validate([
               '_programl' => 'required',
               '_workflow' =>  'required',
            ],
        [
            '_programl.required' => 'Masukkan skil pemograman kamu',
            '_workflow.required' => 'Masukkan workflow yang kamu bisa'
        ]);

        metadata::UpdateOrCreate(['meta_key' => '_programl'], ['meta_value' => $request->_programl]);
        metadata::UpdateOrCreate(['meta_key' => '_workflow'], ['meta_value' => $request->_workflow]);

        return redirect()->route('skill.index')->with('success', 'Berhasil UPDATE DATA SKILL');
        }

    }
}

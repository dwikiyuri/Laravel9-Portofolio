<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\halaman;
use App\Models\project;
use App\Models\riwayat;
use App\Mail\kirimEmail;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class homeController extends Controller
{
    //
    function index()
    {
        $about_id = get_meta_value('halaman_about');
        $about_data = halaman::where('id', $about_id)->first();

        $experience_data = riwayat::where('tipe', 'experience')->get();
        $education_data = riwayat::where('tipe', 'education')->get();

        foreach ($experience_data as $experience) {
            $experience->tahunmulai = Carbon::parse($experience->tanggalmulai)->format('Y');
            $experience->tahunakhir = Carbon::parse($experience->tanggalakhir)->format('Y');
        }

        foreach ($education_data as $education) {
            $education->tahunmulai = Carbon::parse($education->tanggalmulai)->format('Y');
            $education->tahunakhir = Carbon::parse($education->tanggalakhir)->format('Y');
        }
        $category = category::all();
        $project_data = project::orderBy('nama_project','desc')->get();

        $contact_id = get_meta_value('halaman_contact');
        $contact_data = halaman::where('id', $contact_id)->first();
        return view('home.index')->with([
            'about' => $about_data,
            'contact' => $contact_data,
            'experience' => $experience_data,
            'education' => $education_data,
            'project' => $project_data,
            'category' => $category
        ]);
    }
    public function sendMail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        Mail::to('dwikiyurii@gmail.com')->send(new kirimEmail($details));

        if ($request->ajax()) {
            return response()->json(['success' => 'Your message has been sent. Thank you!']);
        }

        return redirect()->route('home')->with('success', 'Your message has been sent. Thank you!');
    }
}

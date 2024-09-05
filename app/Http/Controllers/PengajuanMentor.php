<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Mentor;

class PengajuanMentor extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengajuanmentor', [

            'title' => 'Form Pengajuan Mentor',
        
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->hasFile('curriculumvitae')) {

            $description = "Nama saya adalah $request->name, saya berasal di $request->origin, saya berpendidikan akhir sebagai $request->lasteducation. Posisi mentor yang saya inginkan adalah sebagai $request->course. Pengalaman yang saya miliki adalah $request->experience";
            $fileName = Auth::user()->name.$request->file('curriculumvitae')->getClientOriginalName();
            $CVPath = $request->file('curriculumvitae')->storeAs('CV/', $fileName, 'public');
            Mentor::where('id', Auth::user()->mentor->id)->update([
                'description' => $description,
                'cv' => $CVPath
            ]);

            return redirect()->route('home');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

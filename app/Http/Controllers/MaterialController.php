<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Course;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreMaterialRequest;
use App\Http\Requests\UpdateMaterialRequest;

class MaterialController extends Controller
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
        
    }

    public function spesificForm(Course $course){

        if(Auth::user()->mentor->id == $course->mentor_id){

            return view('addMaterial', [
                'title' => "Tambah Materi ".$course->name,
                'Title' => 'Materi',
                'course' => $course,
            ]);

        }else{

            return redirect()->route('home');

        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $descriptions = explode("\r\n", $request->description);
        $textDescript = '';
        foreach($descriptions as $description){

            $textDescript = $textDescript.'<p>'.$description.'</p>';

        }
        if ($request->hasFile('modul')) {
            $courseName = Course::find($request->course_id)->name;
            $modulName = $request->file('modul')->getClientOriginalName();
            $modulPath = $request->file('modul')->storeAs('modul/'.$courseName, $modulName, 'public');
            
            if($request->hasFile('video')) {
                $videoName = $request->file('video')->getClientOriginalName();
                $videoPath = $request->file('video')->storeAs('video/'.$courseName, $videoName, 'public');

                Material::create([
                    'name' => $request->name,
                    'course_id' => $request->course_id,
                    'modul' => $modulPath, 
                    'video' => $videoPath,
                    'description' => $textDescript,
                ]);
                return redirect()->route('mentor.show', ['mentor' => $request->course_id])
                                ->with('success', 'Materi berhasil ditambahkan');

            }
        }
    
    
    }

    public function learn(Course $course, Material $materi){
        return view('material', [
            'title' => $course->name.'-'.$materi->name,
            'course' => $course,
            'material' => $materi
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMaterialRequest $request, Material $material)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        $id = $material->course_id;
        $material->delete();
        return redirect()->route('mentor.show', ['mentor' => $id])->with('success', 'Materi telah terhapus');
    }
}

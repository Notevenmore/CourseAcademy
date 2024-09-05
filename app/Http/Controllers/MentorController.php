<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use App\Models\Course;
use App\Models\Jurusan;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreMentorRequest;
use App\Http\Requests\UpdateMentorRequest;

class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('homeMentor', [

            'title' => 'Dashboard Mentor'
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMentorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $course = Course::where('id', $id)->first();
        if(Auth::user()->mentor->id == $course->mentor_id){

            return view('courseMentor', [
                'title' => $course->name,
                'course' => $course
            ]);

        }else{

            return redirect()->route('home');

        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mentor $mentor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMentorRequest $request, Mentor $mentor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mentor $mentor)
    {
        //
    }
}

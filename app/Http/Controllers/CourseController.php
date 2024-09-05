<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Jurusan;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addCourse', [
            'title' => 'Tambah Course Baru',
            'Title' => 'Course',
            'jurusans' => Jurusan::all(),
            'users' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $facilities = explode("\r\n", $request->facility);
        $facility = '';
        foreach($facilities as $f){
            $facility .= '<p>'.$f.'</p>';
        }
        Course::create([
            'name' => $request->name,
            'description' => $request->description,
            'requirement' => $request->requirement,
            'price' => $request->price,
            'jurusan_id' => $request->jurusan,
            'mentor_id' => $request->mentor,
            'facility' => $facility,
        ]);
        return redirect()->route('course-data')->with('success', 'Course Added!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurusan $jurusan, Course $course)
    {
        if(Auth::user()->mentor->id != $course->mentor_id){
            return view('course', [
                'title' => 'Course Academy - '.$course->name,
                'jurusan' => $jurusan,
                'jurusans' => Jurusan::all(),
                'course' => $course 
            ]);
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('addCourse', [
            'title' => 'Edit Course - '.$course->name,
            'Title' => 'Course',
            'jurusans' => Jurusan::all(),
            'users' => User::all(),
            'course' => $course
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $facilities = explode("\r\n", $request->facility);
        $facility = '';
        foreach($facilities as $f){
            $facility .= '<p>'.$f.'</p>';
        }
        $course->update([
            'name' => $request->name,
            'description' => $request->description,
            'requirement' => $request->requirement,
            'price' => $request->price,
            'jurusan_id' => $request->jurusan,
            'mentor_id' => $request->mentor,
            'facility' => $facility,
        ]);
        return redirect()->route('course-data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('course-data');
    }
}

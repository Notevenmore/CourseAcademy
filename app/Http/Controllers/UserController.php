<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Mentor;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tables', [
            'title' => 'Data User',
            'labels' => ['Nama', 'Email','Description','CV','status'],
            'datas' => User::all()
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
    public function store(Request $request)
    {
        //
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
        if(isset($request->admin)){
            Admin::where('user_id', $id)->update([
                'status' => true
            ]);
            User::where('id', $id)->update([
                'status' => 'admin'
            ]);
        }else{
            Admin::where('user_id', $id)->update([
                'status' => false
            ]);
        }

        if(isset($request->mentor)){
            Mentor::where('user_id', $id)->update([
                'status' => true
            ]);
            if(!isset($request->admin)){
                User::where('id', $id)->update([
                    'status' => 'mentor'
                ]);
            }else{
                User::where('id', $id)->update([
                    'status' => 'admin'
                ]);
            }
        }else{
            Mentor::where('user_id', $id)->update([
                'status' => false
            ]);
        }
        
        if(isset($request->student)){
            Student::where('user_id', $id)->update([
                'status' => true
            ]);
            if(!isset($request->admin) && !isset($request->mentor)){
                User::where('id', $id)->update([
                    'status' => 'student'
                ]);
            }
        }else{
            Student::where('user_id', $id)->update([
                'status' => false
            ]);
        }

        return redirect()->route('userdata.index')->with('success', 'Status user has been change!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

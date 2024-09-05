<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class Home extends Controller{

    public function index(){

        
        return view('home', [
            'title' => 'Course App',
            'courses' => Course::all()
        ]);

    }

}

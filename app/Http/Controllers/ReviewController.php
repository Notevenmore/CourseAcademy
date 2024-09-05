<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Repliesreview;
use App\Models\Material;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReviewController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->reply){
            
            $replies = explode("\r\n", $request->replies);
            $userreply = '';
            foreach($replies as $reply){
                $userreply = $userreply.'<p>'.$reply.'</p>';
            }
            Repliesreview::create([
                'user_id' => Auth::user()->id,
                'review_id' => $request->review_id,
                'comment' => $userreply
            ]);

        }else{

            $comments = explode("\r\n", $request->comment);
            $usercomment = '';
            foreach($comments as $comment){
    
                $usercomment = $usercomment.'<p>'.$comment.'</p>';
    
            }
            Review::create([
                'user_id' => Auth::user()->id,
                'material_id' => $request->material_id,
                'comment' => $usercomment
            ]);
        
        }
        
        $material = Material::find($request->material_id);
        return redirect()->route('learn', ['course' => $material->course, 'materi' => $material]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;



class MyComments extends Controller
{
    public function commentdata()
    {


            $data = Comment::where('user_id', Auth::user()->id)->get();

            return view('user.mycomments')->with('data',$data);
        
    }    
}

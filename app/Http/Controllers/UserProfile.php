<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class UserProfile extends Controller
{
     public function profiledata()   

     {
        $data = User::where('id', Auth::user()->id)->get();
        return view("user.prof")->with('data',$data);
     }   
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class Users extends Controller
{
    public function getdata()   {
        $data = User::where('id', Auth::user()->id)->get();
        return view("user.edit")->with('data',$data);
   } 

   public function postdata(Request $request)
   {
       $user = new User;
      User:: where('id', Auth::user()->id)->update(array
        ( 
            'first_name' => $request->input('first_name') ,
            'last_name' => $request->input('last_name'),
            'name' => $request -> input('name'),
            'email' => $request -> input('email'),
        ));
        $user->update();
        return redirect(route('user.edit'))->with('profile successfully updated');
     }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use App\Models\User;
use Illuminate\Support\Facades\Hash;

class profile extends Controller
{
    public function index()
    {
       
        return view('user.change_password');
    }

       

    public function update_password(Request $request)

        {
             $validatedData = $request->validate([
                    'current_password' => ['required'],
                    'new_password' => ['required'],
                    'password_confirmation' => ['same:new_password']
                ]);

            $user = new User ;
           $hashedPassword = User::select('password')->where('id',Auth::user()->id)->get();
        foreach($hashedPassword as $user )
           if (Hash::check($request->input('current_password'), $user->password)) 
           {
            
                    
                if(strcmp($request->input('current_password'), $request->input('new_password')) == 0)
                {
                    // Current password and new password same
                    return redirect()->back()->with("error","New Password cannot be same as your current password.");
                }
                else {
                   User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
                   $user->save();

                  return redirect(route('user.update_password'));  
               }
            } 
            else {
                return redirect()->back()->with("error","Your current password does not matches with the password.");
            }

        
    }
}




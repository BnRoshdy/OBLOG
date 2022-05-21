<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
use App\Models\Post;
class users extends Controller
{
    public function getdata(){
        $data = User::select('*')->whereNotIn('status',['admin'])->get();
        return view('admin.users')->with('data',$data);
    }
   public function update(Request $request){
    $button = $request->input('submit');
    if ($button == "Premium") {
        $s = new Post;
        $id = $request->input('radio');
        User::where('id',$id)->update(array('status'=>'premium'));
        $s->update();
        return redirect(route('admin.user'));
    }
    else if ($button == "Delete") {
            $id = $request->input('radio');
            $data0 = Comment::where('user_id',$id); 
            $data1 = Post::where('user_id',$id); 
            $data2 = User::where('id',$id); 
            $data0->delete();
            $data1->delete();
            $data2->delete(); 
            return redirect(route('admin.user'));
   } 
}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;

use App\Models\View;
use Carbon\Carbon;
use App\Http\Requests\PostFormRequest;
use Illuminate\Support\Facades\Auth;
use Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        
        $s = new View;
        $date = sizeof(View::select('views')->whereMonth('created_at', Carbon::now())
                        ->whereyear('created_at', Carbon::now())->get());
        if ($date!=0) {
        View::increment('views');
        $s->update();
        }
         else{
            $s->views = 1;
            $s->save();
         }

        $pined= Post::where('pined','pined')->get(); 
        $unpined= Post::where('pined','unpined')->get(); 
        
        // $posts =Post::all();
        return view('NewAnime')->with('pined' , $pined)->with('unpined' , $unpined);
        
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // $data = $request->validate([
        //     'title' => 'required',
        //     'description' => 'required',
        //     'image_path' => 'required',
        //     'category' => 'required'
        // ]);

        $file_extension = $request -> file -> getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'C:\xampp\htdocs\blog-master\public\image\postPic';
        $request -> file -> move($path,$file_name);


        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->title = $request->input('title');
        $post->category = $request->input('category');
        $post->description = $request->input('description');
        // $post->title = $data['title'];
        // $post->description = $data['description'];
        $post -> image_path = $file_name;
        // $post->category = $data->input['category'];
        $post->status = 'unconfirmed';
        $post->pined = 'unpined';
        $post->views = 0;
        $post->no_of_comment = 0;
        $post->save();

        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $s = new Post;
        Post::where('id',$id)->increment('views');
        $s->update();
        session::put('postid', $id);

        
        // $comment = Comment::where('post_id',$id)->get();

        // $post->user_id = Auth::user()->name; 
        $name =Post::join('users', 'posts.user_id', '=', 'users.id')
        ->select('name')->where('posts.id',$id)
        ->get();

        $commentname = Comment::join('users', 'comments.user_id', '=', 'users.id')
        ->select('name','description')->where('comments.post_id',$id)
        ->get();
                

        $post = Post::where("id",$id)->get();
        return view('PostPage')->with('post',$post)->with('commentname',$commentname)->with('name',$name);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostFormRequest $request ,Post $post)
    {
        // $data = $request->validate();
        // $post->title = $data['title'];
        // $post->description = $data['description'];
        // $post->image_path = $data['image_path'];
        // $post->category = $data['category'];
        // $post->status = $data['status'];
        // $post->pined = $data['pined'];
        // $post->no_of_comment = $data['no_of_comment'];
        // $post->save();

        // return redirect()->route('/', $post->$id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

    }
}

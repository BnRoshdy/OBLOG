<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\View;
use Carbon\Carbon;
use App\Http\Requests\PostFormRequest;

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
        

         $posts = Post::all();
         return view('home1')->with('posts' , $posts);
    
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    {
        
        $data = $request->validate();

        $post = new Post();

        $post->title = $data['title'];
        $post->description = $data['description'];
        $post->image_path = $data['image_path'];
        $post->category = $data['category'];
        $post->status = $data['status'];
        $post->pined = $data['pined'];
        $post->no_of_comment = $data['no_of_comment'];
        $post->save();
        return redirect()->route('/');
        
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

        $post = Post::where("id",$id)->get();
        return view('home2')->with('post',$post);
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
        $data = $request->validate();

        $post->title = $data['title'];
        $post->description = $data['description'];
        $post->image_path = $data['image_path'];
        $post->category = $data['category'];
        $post->status = $data['status'];
        $post->pined = $data['pined'];
        $post->no_of_comment = $data['no_of_comment'];
        $post->save();

        return redirect()->route('/', $post->$id);

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

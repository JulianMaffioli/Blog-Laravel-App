<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; //Adding the Post Model
use App\User; //Adding the User Model
use Illuminate\Support\Facades\URL;
use Illuminate\Auth\Access\AuthorizationException;


class PostsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Fetching the data from the model
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        //Saving the post with Tinker (We can use also SQL Querty)
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->save();

        if ((url()->previous() == url('/home'))) {
            return redirect('/home')->with('success', 'Post Created Successfully');
        } else {
            return redirect('/posts')->with('success', 'Post Created Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post =  Post::find($id);
        $user =  User::find($post->user_id);

        return view('posts.show', ['post' => $post, 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post =  Post::find($id);

        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'You are not authorized to do that');
        }

        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $post =  Post::find($id);


        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        //Saving the post with Tinker (We can use also SQL Querty)

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();


        if ((url()->previous() == url('/home'))) {
            return redirect('/home')->with('info', 'Post Updated');
        } else {
            return redirect('/posts')->with('info', 'Post Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post =  Post::find($id);

        if(auth()->user()->id == $post->user_id){
            $post->delete();

            if ((url()->previous() == url('/home'))) {
                return redirect('/home')->with('error', 'Post Removed');
            } else {
                return redirect('/posts')->with('error', 'Post Removed');
            }
        }

        if ((url()->previous() == url('/home'))) {
            return redirect('/home')->with('error', 'You are not authorized to do that');
        } else {
            return redirect('/posts')->with('error', 'You are not authorized to do that');
        }





    }
}

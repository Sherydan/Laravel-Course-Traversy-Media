<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use DB;

class PostsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {   
        # implementar middleware a todas las vistas, excepto index y show
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        # $posts = Post::orderBy('created_at', 'desc')->get();
        # $post = Post::where('title', 'Post Two')->get();
        # $posts = DB::select('SELECT * FROM posts ORDER BY created_at DESC');
        # $posts = Post::orderBy('created_at', 'desc')->take(1)->get();
        # $posts = Post::All();

        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
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
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        # handle file upload
        if ($request->hasFile('cover_image')) {
            if ($request->file('cover_image')->isValid()) {
                # get file name with extension
                # $fielNameWithExt = $request->file('cover_image');
                # get just filename
                # $fileName = pathinfo($fielNameWithExt, PATHINFO_FILENAME);
                # get just ext
                # $extension = $request->file('cover_image')->extension();
                # file name to store
                $fileNameToStore = $request->file('cover_image')->hashName();
                # upload image
                $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
            }
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        # Create post

        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;

        if ($post->save()) {
            return redirect('/posts')->with('success', 'Post Created');
        } else {
            return view('posts.create')->with('error', 'There was an error creating your post');
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
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Page');
        } else {
            return view('posts.edit')->with('post', $post);
        }
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        # handle file upload
        if ($request->hasFile('cover_image')) {
            if ($request->file('cover_image')->isValid()) {
                # get file name with extension
                # $fielNameWithExt = $request->file('cover_image');
                # get just filename
                # $fileName = pathinfo($fielNameWithExt, PATHINFO_FILENAME);
                # get just ext
                # $extension = $request->file('cover_image')->extension();
                # file name to store
                $fileNameToStore = $request->file('cover_image')->hashName();
                # upload image
                $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
            }
        }

        # Update post

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if ($request->hasFile('cover_image')) {
            $post->cover_image = $fileNameToStore;
        }

        if ($post->save()) {
            return redirect('/posts')->with('success', 'Post Updated');
        } else {
            return view('posts.create')->with('error', 'There was an error updating your post');
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
        $post = Post::find($id);

        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Page');
        } else {
            if ($post->cover_image != 'noimage.jpg') {
                Storage::delete('public/cover_images/'.$post->cover_image);

                if ($post->delete()) {
                    return redirect('/posts')->with('success', 'Post Deleted');
                } else {
                    return view('/posts')->with('error', 'There was an error deleting your post');
                }
            }
            
        }

        



    }
}

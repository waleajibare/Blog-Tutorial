<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

//use App\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\Category;
use Session;


class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Index()
    {
        // create a variable and store all the blog post in it from the database
           
         $posts = Post::orderBy('id', 'desc')->paginate(5);

        // return a view and pass in the above variable

         return view('posts.index')->withPosts($posts);

        //$posts = DB::table('posts')->paginate(5);
 
        //return view('posts.index', ['posts' => $posts]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, array(
             'title' => 'required|max:255',
             'slug'  => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
             'category_id'  => 'required|integer',
             'body'  => 'required'



        ));

        // store in the database
        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = $request->body;

        $post->save();
        $post->tags()->sync($request->tags, false);

        // redirect to another page
        Session::flash('success', 'The blog post was successfully saved!');

        return redirect()->route('posts.show', $post->id);
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
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the post in the database and save as a var 

        $post = Post::find($id);
        $categories = Category::all();
        $cats = array();
        foreach($categories as $category){
             $cats[$category->id] = $category->name;
         }

         $tags = Tag::all();
         $tags2 = array();
         foreach($tags as $tag){

            $tags2[$tag->id] = $tag->name;
         }



        // return the view and pass in the var we previously created

        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
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
        //Validate the data
        $post = Post::find($id);
        if ($request->input('slug')== $post->slug) {
            $this->validate($request, array(
             'title' => 'required|max:255',
             //'category_id'  => 'integer',
             'body'  => 'required'
         ));
        } else{

            $this->validate($request, array(
             'title' => 'required|max:255',
             'slug'  => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
             //'category_id'  => 'integer',
             'body'  => 'required'
         ));

        }
        

        // Save the data to the database

             $post = Post::find($id);

             $post->title = $request->input('title');
             $post->slug = $request->input('slug');
            // $post->category_id = $request->input('category_id');
             $post->body = $request->input('body');

             $post->save();

             //$post->tags()->sync($request->tags);

        // set flash data with success message
             Session::flash('success', 'This post was successfully saved.');

        // redirect with flash data to posts.show

             return redirect()->route('posts.show', $post->id);
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
        $post->tags()->detach();

        $post->delete();
        
        Session::flash('success', 'The post was successfully deleted.');
        return redirect()->route('posts.index');
    }
}








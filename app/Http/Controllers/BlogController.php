<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{

	public function getIndex()
    {
        // create a variable and store all the blog post in it from the database
           
         $posts = Post::orderBy('id', 'desc')->paginate(5);

        // return a view and pass in the above variable

         return view('blog.index')->withPosts($posts);

        //$posts = DB::table('posts')->paginate(5);
 
        //return view('posts.index', ['posts' => $posts]);


    }



    public function getSingle($slug) {

        // fetch from the database based on slug

        $post = Post::where('slug', '=', $slug)->first();

        // return the view and pass in the post object

        return view('blog.single')->withPost($post);
    }
}

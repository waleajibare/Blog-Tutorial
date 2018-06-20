@extends('base')

@section('title', '| Homepage')

@section('content')
         <div class="row">
           <div class="col-md-12">
             <div class="jumbotron">
                <h1 class="display-4">Welcome to My Blog!</h1>
                <p class="lead">Thank you so much for visiting. This is my test website built with Laravel. Please read my popular post!</p>
                <a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a>
              </div>
           </div>
         </div> <!-- end of header .row -->
         <div class="row">
             <div class="col-md-8">

                @foreach($posts as $post)


                <div class="post">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ substr($post->body, 0, 150) }}{{ strlen($post->body) > 50 ? "...." : "" }}</p>
                    <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>
                </div>

                <hr>

                @endforeach

             
        
               
                
             </div>

             <div class="col-md-3 offset-1">
               <h2>Sidebar</h2>
             </div>
            
         </div>
  @endsection
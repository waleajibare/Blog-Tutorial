@extends('base')

<?php $titleTag = htmlspecialchars($post->title); ?>

@section('title', "| $titleTag")


@section('content')

<style type="text/css">
     .comment{
        margin-bottom: 45px;
     }

    .author-image{
        width: 50px;
        height: 50px;
        border-radius: 50%;
        float: left;
    }

    .author-name{
        float: left;
        margin-left: 15px;
    }

    .author-name>h4{
        margin: 5px 0px;
    }

    .comment-content{
        clear: both;
        margin-left: 65px;
        font-size: 16px;
        line-height: 1.3em;
    }

    .author-time{
        font-size: 11px;
        font-style: italic;
        color: #aaa;
    }

    .comments-title{
        margin-bottom: 45px;
    }
   
    .comments-title>span{
        margin-right: 15px;
    }

    
</style>
     
     <div class="row">
     	
         
         <div class="col-md-8 offset-2">
         	
         	<h1>{{ $post->title }}</h1>
         	<p>{{ $post->body }}</p>
         	<hr>
         	<p>Posted In: {{ $post->category->name }}</p>

         </div>

     </div>

     <div class="row">
         <div class="col-md-8 offset-2">
            <h3 class="comments-title" ><span class="glyphicon glyphicon-comment"></span>{{ $post->comments()->count() }} Comments</h3>
             @foreach ($post->comments as $comment)

                <div class="comment">
                    <div class="author-info">
                        <div>
                          <img src='{{"https://www.gravatar.com/avatar/" .md5(strtolower(trim($comment->email))) }}' class="author-image">
                        </div>
                        <div class="author-name">
                          <h4>{{ $comment->name }}</h4>
                          <p class="author-time">{{ date('F nS, Y - g:iA') }}</p>
                        </div>
                    </div>

                    <div class="comment-content">
                      {{ $comment->comment }}
                    </div>

                 </div>

             @endforeach


         </div>
     </div>

     <div class="row">
         
         <div id="comment-form" class="col-md-8 offset-2" style="margin-top: 50px;">
             
             <form action="{{ route('comments.store', $post->id) }}" method="post">
                {{ csrf_field() }}
                 
                 <div class="row">
                     <div class="col-md-6">
                         <label for="name">Name</label>
                         <input type="text" name="name" class="form-control">
                     </div>

                     <div class="col-md-6">
                         <label for="email">Email</label>
                         <input type="text" name="email" class="form-control">
                     </div>

                     <div class="col-md-12">
                         <label for="comment">Comment</label>
                         <textarea rows="5" name="comment" class="form-control"></textarea>
                         <input type="submit" class="btn btn-success btn-block" value="Add Comment" style="margin-top: 15px;">

                     </div>



                 </div>


             </form>
         </div>
     </div>


@endsection
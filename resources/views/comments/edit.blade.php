@extends('base')


@section('title', '| Edit Comment')


@section('content')

  <div class="row">
    
    <div class="col-md-8 offset-2">

    <h1>Edit Comment</h1>

    <form method="post" action="{{ route('comments.update', $comment->id) }}">
           	  {{ csrf_field() }}
           	  <input type="hidden" name="_method" value="put">
       <label for="name">Name:</label>
       <input type="text" name="name" class="form-control" value="{{ $comment->name }}" disabled>

       <label for="email">Email:</label>
       <input type="text" name="email" class="form-control" value="{{ $comment->email }}" disabled>

       <label for="comment">Comment:</label>
       <textarea rows="5" class="form-control" name="comment">{{ $comment->comment }}</textarea>

       <input type="submit" value="Update Comment" class="btn btn-block btn-success" style="margin-top: 15px;">
     </form>   

     </div>   

   </div>  




@endsection
@extends('base')

@section('title', '| Delete Comment')

@section('content')
  <div class="row">
   <div class="col-md-8 offset-2">
   	<h1>Delete this comment</h1>
    
   <p>
   	 <strong>Name:</strong>{{ $comment->name }}
     <strong>Email:</strong>{{ $comment->email }}
     <strong>Comment:</strong>{{ $comment->comment }}
   </p>

   <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
       {{ csrf_field() }}
    <input type="hidden" name="_method" value="delete">

    <input type="submit" value="Yes Delete This Comment" class="btn btn-block btn-danger" style="margin-top: 15px;">
   	
   </form>
   </div>
  </div>


@endsection
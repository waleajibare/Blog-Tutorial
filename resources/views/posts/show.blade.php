@extends('base')

@section('title', "| $post->title")

@section('content')
  <div class="row">
    <div class="col-md-8">
    <h1>{{ $post->title }}</h1>
    <p class="lead">{{ $post->body }}</p>

    <hr>
    <div class="tags">

    @foreach ($post->tags as $tag)
      
      <span class="badge badge-secondary">{{ $tag->name }}</span>

    @endforeach

    </div>

    <div class="backend-comments" style="margin-top: 50px;">
        <h1>Comments <small>{{ $post->comments()->count() }} total</small></h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Comment</th>
                    <th width="70px"></th>

                </tr>
            </thead>

         <tbody>
            @foreach ($post->comments as $comment)
            <tr>
                <td>{{ $comment->name }}</td>
                <td>{{ $comment->email }}</td>
                <td>{{ $comment->comment }}</td>
                <td><a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a></td>
            </tr>
            @endforeach
        </tbody>
        </table>
        
    </div>



    </div>

    <div class="col-md-4">
    	<div class="card">

            <dl class="dl-horizontal">
                <dt>Url:</dt>
                <dd><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></dd>
            </dl>

            <dl class="dl-horizontal">
                <dt>Category:</dt>
                <dd>{{ $post->category->name }}</dd>
            </dl>

    		<dl class="dl-horizontal">
    			<dt>Created At:</dt>
    			<dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
    		</dl>

    		<dl class="dl-horizontal">
    			<dt>Last Updated:</dt>
    			<dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
    		</dl>
    		<hr>
    		<div class="row">
    			<div class="col-sm-6">

    				<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-block">Edit</a>
    				
    			</div>

    			<div class="col-sm-6">
                    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
    				<input type="submit" class="btn btn-danger btn-block" value="Delete">
    				</form>
    			</div>
    		</div>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    <a href="{{ route('posts.index') }}" class="btn btn-success btn-block btn-h1-spacing">View all posts</a>
                </div>
            </div>

    	</div>
    </div>

  </div>
@endsection
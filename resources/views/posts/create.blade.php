@extends('base')

@section('title', '| Create New Post')


@section('stylesheets')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection


@section('content')
   <div class="container">
    	  <h1>Create New Post</h1>
    	  <hr>
    	  <form method="post" action="{{route('posts.store')}}">
    	    {{csrf_field()}}
    	  	<div class="row">
    	  			<div class="form-group col-md-6">
    	  		     <label for="title">Title:</label>
    	  		      <input type="text" class="form-control" name="title" required>
                    </div>
    	  	</div>

            <div class="row">
                    <div class="form-group col-md-6">
                     <label for="slug">Slug:</label>
                      <input type="text" class="form-control" name="slug" minlength="5" maxlength="255" required>
                    </div>
            </div>

            <div class="row">
                    <div class="form-group col-md-6">
                     <label for="category_id">Category:</label>
                     <select class="form-control" name="category_id">
                        @foreach($categories as $category)
                         <option value='{{ $category->id}}'>{{ $category->name }}</option>
                        @endforeach
                     </select>
                    </div>
            </div>

            <div class="row">
                    <div class="form-group col-md-6">
                     <label for="tags">Tags:</label>
                     <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                        @foreach($tags as $tag)
                         <option value='{{ $tag->id}}'>{{ $tag->name }}</option>
                        @endforeach
                     </select>
                    </div>
            </div>

    	  	<div class="row">
    	  		   <div class="form-group col-md-6">
    	  		     <label for="body">Post Body:</label>
    	  		     <textarea cols="6" rows="8" class="form-control" name="body" required></textarea>
    	  		   </div>
    	  	</div>

    	  	<div class="row">
    	  		   <div class="form-group col-md-6">
    	  		     
    	  		     <button type="submit" class="btn btn-success btn-lg btn-block">Create Post</button>
    	  		   </div>
    	  	</div>
    	  	
    	  </form>
    	 
   </div>

@endsection

@section('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

        <script type="text/javascript">
            $('.select2-multi').select2();
        </script>
@endsection


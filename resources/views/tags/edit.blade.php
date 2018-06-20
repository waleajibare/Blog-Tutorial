@extends('base')

@section('title', "| Edit Tag")

@section('content')

   <form method="post" action="{{ route('tags.update', $tag->id) }}">
           	  {{ csrf_field() }}
           	  <input type="hidden" name="_method" value="put">
            <div class="col-md-6">
             
              <div class="form-group">
                 <label for="name">Title:</label>
    	  	     <p><input type="text" class="form-control" name="name"  value="{{ $tag->name }}"></p>
    	  	     <input type="submit" class="btn btn-success" value="Save Changes">
    			

              </div>
              
             
            </div>
</form>


@endsection
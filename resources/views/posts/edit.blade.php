@extends('base')

@section('title', '| Edit Blog Post')

@section('stylesheets')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />


@section('content')

<div class="row">
	<div class="col-md-10">
           <form method="post" action="{{ route('posts.update', $post->id) }}">
           	  {{ csrf_field() }}
           	  <input type="hidden" name="_method" value="put">
            <div class="col-md-6">
             
              <div class="form-group">
                 <label for="title">Title:</label>
    	  	     <input type="text" class="form-control" name="title"  value="{{ $post->title }}">
              </div>

              <div class="form-group">
                 <label for="slug">Slug:</label>
                 <input type="text" class="form-control" name="slug"  value="{{ $post->slug }}">
              </div>

              <div class="form-group">
                 <label for="category_id">Category:</label>
                 <select class="form-control" name="category_id" value="" disabled>
                       
                <option value=''>{{ $post->category->name }}</option>
                
                 </select>
              </div>

              <div class="form-group">
                 <label for="tags">Tags:</label>
                 <select class="form-control select2-multi" name="tags[]" multiple="multiple" value="" disabled>
                       
                <option value=''></option>
                
                 </select>
              </div>
                 
              <div class="form-group">
    	  	     <label for="body">Body:</label>
    	  	     <textarea cols="8" rows="5" class="form-control" name="body">{{ $post->body }}</textarea>
              </div>
                  
            </div>
          
           
            <div class="col-md-4">
    	      <div class="well">
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

    				<a href="{{ route('posts.show', $post->id) }}" class="btn btn-danger btn-block">Cancel</a>
    				
    			</div>

    			<div class="col-sm-6">
                <input type="submit" class="btn btn-success btn-block" value="Save Changes">
    			
    				
    			</div>
    		    </div>

    	      </div>
            </div>
           </form>
       </div>
     
  </div> <!--- end of .row -->

@endsection

@section('scripts')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

   <script type="text/javascript">
            $('.select2-multi').select2();
        </script>
@endsection
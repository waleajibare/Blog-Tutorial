@extends('base')

@section('title', "| All Tags")

@section('content')
     
     <div class="row">
     	<div class="col-md-8">
          <h1>Tags</h1>  
          <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($tags as $tag)
                <tr>
                    <th>{{ $tag->id }}</th>
                    <td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
                </tr>
                @endforeach

            </tbody>
              
          </table>
        </div> <!-- end of .col-md-8 -->

        <div class="col-md-3">
            <div class="card">
                <form method="post" action="{{route('tags.store')}}">
            {{csrf_field()}}
                <h2>New Tag</h2>
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" required>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Create New Tag</button>
            </form>
            </div>
        </div>
         
         
     </div>


@endsection
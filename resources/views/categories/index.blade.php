@extends('base')

@section('title', "| All Categories")

@section('content')
     
     <div class="row">
     	<div class="col-md-8">
          <h1>Categories</h1>  
          <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <th>{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                </tr>
                @endforeach

            </tbody>
              
          </table>
        </div> <!-- end of .col-md-8 -->

        <div class="col-md-3">
            <div class="card">
                <form method="post" action="{{route('categories.store')}}">
            {{csrf_field()}}
                <h2>New Category</h2>
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" required>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Create New Category</button>
            </form>
            </div>
        </div>
         
         
     </div>


@endsection
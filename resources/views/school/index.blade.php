@extends('master')
@section('mainContent')

<h1>All the schools</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
          
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($school as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
      

            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <div style="width: 20%; float: left;">                <a class="btn btn-small btn-success" href="{{ URL::to('School/' . $value->id) }}">Show</a>

                    <!-- edit this shark (uses the edit method found at GET /School/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('School/' . $value->id . '/edit') }}">Edit</a>
    </div>

<div>            
                <form method="POST" action="{{ route('School.destroy', $value->id) }}">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button type="submit" class="btn btn-danger delete" title='Delete'>Delete</button>
                </form>
            </div>



            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<script>
    $().ready(function(){
       $('.view').fadeOut('30');

        $('.add').fadeIn('fast').attr('href','{{ URL::to('School/create') }}')
    })
    </script>
@endsection
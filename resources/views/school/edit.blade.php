@extends('master')
@section('mainContent')

<h1>Edit {{ $school->name }}</h1>

<form name="add-blog-post-form" id="add-blog-post-form" method="POSt" action="{{route('School.update', $school->id)}}">
    @csrf
    @method('PUT')

     <div class="form-group">
       <label for="exampleInputEmail1">Name</label>
       <input type="text" id="name" name="name" class="form-control" required="" value="{{$school->name}}">
       @if($errors->has('name'))
    <div class="error">{{ $errors->first('name') }}</div>
@endif
     </div>
   
     <button type="submit" class="btn btn-primary">Edit</button>
   </form>

   <script>
    $().ready(function(){
        $('.add').fadeOut('30');
        $('.view').fadeIn('fast').attr('href','{{ URL::to('School') }}')
    })
    </script>
@endsection
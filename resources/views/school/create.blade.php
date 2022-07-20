@extends('master')
@section('mainContent')

<h1>Create a school</h1>

<!-- if there are creation errors, they will show here -->
<form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('School')}}">
    @csrf
     <div class="form-group">
       <label for="exampleInputEmail1">Name</label>
       <input type="text" id="name" name="name" class="form-control" required="">
     </div>
   
     <button type="submit" class="btn btn-primary">Submit</button>
   </form>
   <script>
    $().ready(function(){
        $('.add').fadeOut('30');
        $('.view').fadeIn('fast').attr('href','{{ URL::to('School') }}')
    })
    </script>
@endsection
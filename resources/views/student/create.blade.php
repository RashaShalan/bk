@extends('master')
@section('mainContent')

<h1>Create a student</h1>

<!-- if there are creation errors, they will show here -->
<form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('Student')}}">
    @csrf
     <div class="form-group">
       <label for="exampleInputEmail1">Name</label>
       <input type="text" id="name" name="name" class="form-control" required="">
     </div>
     <div class="form-group">
        <label for="exampleInputEmail1">School</label>
        <select class="form-control" name="school_id" id="school_id">
            @foreach ($school as $school )
                <option value="{{$school->id}}">{{$school->name}}</option>
            @endforeach
        </select>
      </div>
     <button type="submit" class="btn btn-primary">Submit</button>
   </form>
   <script>
    $().ready(function(){
        $('.add').fadeOut('30');
        $('.view').fadeIn('fast').attr('href','{{ URL::to('Student') }}')
    })
    </script>
@endsection
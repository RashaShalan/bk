@extends('master')
@section('mainContent')

<h1>Edit {{ $student->name }}</h1>

<form name="add-blog-post-form" id="add-blog-post-form" method="POSt" action="{{route('Student.update', $student->id)}}">
    @csrf
    @method('PUT')

     <div class="form-group">
       <label for="exampleInputEmail1">Name</label>
       <input type="text" id="name" name="name" class="form-control" required="" value="{{$student->name}}">
       @if($errors->has('name'))
    <div class="error">{{ $errors->first('name') }}</div>
@endif
     </div>
     <div class="form-group">
        <label for="exampleInputEmail1">School</label>
        <select class="form-control" name="school_id" id="school_id">
            @foreach ($school as $school )
                <option value="{{$school->id}}" @if($school->id==$student->school->id) selected @endif>{{$school->name}}</option>
            @endforeach
        </select>
      </div>
     <button type="submit" class="btn btn-primary">Edit</button>
   </form>
   <script>
    $().ready(function(){
        $('.add').fadeOut('30');
        $('.view').fadeIn('fast').attr('href','{{ URL::to('Student') }}')
    })
    </script>

@endsection
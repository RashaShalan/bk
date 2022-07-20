
    @extends('master')
@section('mainContent')

<h1>Showing info of student : {{ $student->name }}</h1>

    <div class="jumbotron text-center">
        <h2>Name : {{ $student->name }}</h2>
       <p>School : {{ $student->school->name }}</p>
       <p>Order : {{ $student->order }}</p>
    </div>
    <script>
        $().ready(function(){
            $('.add').fadeOut('30');
            $('.view').fadeIn('fast').attr('href','{{ URL::to('Student') }}')
        })
        </script>
@endsection
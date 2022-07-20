@extends('master')
@section('mainContent')

<h1>Showing {{ $school->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $school->name }}</h2>
       
    </div>
    <script>
        $().ready(function(){
            $('.add').fadeOut('30');
            $('.view').fadeIn('fast').attr('href','{{ URL::to('School') }}')
        })
        </script>
@endsection
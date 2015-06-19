@extends('app')

@section('content')
    <!-- {{ $name }}  : unescape data-->
    <!-- {{!! $name !!}}  : escape data-->
    <!-- <h1>About Pages : {{ $name }}</h1> -->
    <!-- <h1>About Pages : {!! $name !!}</h1> -->

    @if($first == 'lukeS')
    <h1>About Pages : {!! $first !!}{!! $last !!}</h1>
    @else
        <h1>else</h1>
    @endif

    <!-- If $people array is not empty -->
    @if(count($people))
        <h3>People i like :</h3>

        @foreach ($people as $person)
            <li>{{ $person }}</li>
        @endforeach
    @endif

    <!-- @unles : opposite of if @endunles-->

    <!-- @foreelse : if your have foreach content @endforeelse-->

    <p>lorem ipsum</p>
@stop

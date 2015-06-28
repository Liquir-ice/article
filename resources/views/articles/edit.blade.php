@extends('app')

@section('content')
    <h1>Edit : {!! $article->title !!}</h1>

    {!! Form::model($article, ['method' => 'PATCH', 'action' => ['ArticlesController@update', $article->id]]) !!}

        @include ('articles.form', ['submitButtonText' => 'Update Article'])

    {!! Form::close() !!}

    <!-- {{ var_dump($errors) }} -->
    <!-- @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif -->

    @include('errors.list')
@stop

@extends('layouts.admin')



@section('content')

    <h1 class="text-center"> Create Post </h1>
    <div class="row">

        {!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store', 'files'=>true]) !!}

        {{csrf_field()}}

        <div class="form-group">
            {!! Form::label('title','Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control ']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('user_id','Author:') !!}
            {!! Form::select('user_id',[''=>'Choose Option']+$users,null, ['class'=>'form-control ']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category_id','Category:') !!}
            {!! Form::select('category_id',[''=>'Choose Option']+$cats,null, ['class'=>'form-control ']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('photo_id','Photo:') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control ']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('body','Content:') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>6]) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('create Post', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>



    <div class="row">
        @include('includes.form_errors')
    </div>






@endsection
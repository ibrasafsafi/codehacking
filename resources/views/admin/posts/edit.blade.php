@extends('layouts.admin')



@section('content')

    <h1 class="text-center"> Update Post </h1>
    <div class="row">
        <div class="col-sm-3">
            <img src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt=""
                 class="img-responsive img-rounded">
        </div>


        <div class="col-sm-9">

            {!! Form::model($post,['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}

            {{csrf_field()}}

            <div class="form-group">
                {!! Form::label('title','Title:') !!}
                {!! Form::text('title', null, ['class'=>'form-control ']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('body','Content:') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control ']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('category_id','category:') !!}
                {!! Form::select('category_id',$cats,null, ['class'=>'form-control ']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id','Photo:') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control ']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update Post', ['class'=>'btn btn-primary pull-left col-sm-2']) !!}
            </div>

            {!! Form::close() !!}



            {!! Form::model($post,['method'=>'DELETE', 'action'=>['AdminPostsController@update', $post->id]]) !!}

            {{csrf_field()}}

            <div class="form-group">
                {!! Form::submit('Delete Post', ['class'=>'btn btn-danger pull-right col-sm-2']) !!}
            </div>

            {!! Form::close() !!}


        </div>
    </div>



    <div class="row">
        @include('includes.form_errors')
    </div>






@endsection
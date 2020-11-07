@extends('layouts.admin')

@section('content')
    <h2>Update Category</h2>

    <div class="col-sm-6">
        {!! Form::model($category,['method'=>'PATCH', 'action'=>['AdminCategoriesController@update',$category->id]]) !!}

        {{csrf_field()}}

        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name', $category->name, ['class'=>'form-control ']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('UPDATE', ['class'=>'btn btn-primary push-left col-sm-6']) !!}
        </div>

        {!! Form::close() !!}


        {!! Form::model($category,['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy',$category->id]]) !!}

        {{csrf_field()}}

        <div class="form-group">
            {!! Form::submit('DELETE', ['class'=>'btn btn-danger col-sm-6 push-right']) !!}
        </div>

        {!! Form::close() !!}
    </div>



@endsection
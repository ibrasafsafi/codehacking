@extends('layouts.admin')



@section('content')

    <h1 class="text-center"> Update User </h1>
    <div class="row">
        <div class="col-sm-3">
            <img src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt=""
                 class="img-responsive img-rounded">
        </div>


        <div class="col-sm-9">

            {!! Form::model($user,['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}

            {{csrf_field()}}

            <div class="form-group">
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control ']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email','E-mail:') !!}
                {!! Form::email('email', null, ['class'=>'form-control ']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password','Password:') !!}
                {!! Form::password('password', ['class'=>'form-control ']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id','Photo:') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control ']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('is_active','Status:') !!}
                {!! Form::select('is_active', array(1 => 'Active', 0=>'Not Active'),null, ['class'=>'form-control ']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id','Role:') !!}
                {!! Form::select('role_id',[''=>'Choose Option']+$roles,3, ['class'=>'form-control ']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update User', ['class'=>'btn btn-primary pull-left col-sm-2']) !!}
            </div>

            {!! Form::close() !!}



            {!! Form::model($user,['method'=>'DELETE', 'action'=>['AdminUsersController@update', $user->id]]) !!}

                {{csrf_field()}}

                <div class="form-group">
                    {!! Form::submit('Delete User', ['class'=>'btn btn-danger pull-right col-sm-2']) !!}
                </div>

            {!! Form::close() !!}


        </div>
    </div>



    <div class="row">
        @include('includes.form_errors')
    </div>






@endsection
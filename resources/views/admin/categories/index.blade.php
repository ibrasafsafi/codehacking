@extends('layouts.admin')


@section('content')

    <h1>Categories</h1>

    <div class="col-sm-6">
        {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}

            {{csrf_field()}}

            <div class="form-group">
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control ']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}
    </div>


    <div class="col-sm-6">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cats as $cat)
                <tr>
                    <td>{{$cat->id}}</td>
                    <td><a href="{{route('admin.categories.edit',$cat->id)}}">{{$cat->name}}</a></td>
                    <td>{{$cat->created_at ? $cat->created_at->diffForHumans() : "No Date"}}</td>
                    <td>{{$cat->updated_at ? $cat->updated_at->diffForHumans() : "No Date"}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>




@endsection
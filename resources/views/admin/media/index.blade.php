@extends('layouts.admin')

@section('content')

    <h2 class=" ">MEDIA</h2>

    @if($medias)
        <div class=" ">
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
                @foreach($medias as $media)
                    <tr>
                        <td>{{$media->id}}</td>
                        <td><img height="50" class="img-rounded" src="{{$media->file ? $media->file : "No Media"}}"
                                 alt=""></td>
                        <td>{{$media->created_at ? $media->created_at->diffForHumans() : "No Media"}}</td>
                        <td>{{$media->updated_at ? $media->updated_at->diffForHumans() : "No Media"}}</td>
                        <td>
                            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediaController@destroy',$media->id]]) !!}

                                {{csrf_field()}}

                                <div class="form-group">
                                    {!! Form::submit('DELETE', ['class'=>'btn btn-danger']) !!}
                                </div>

                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    @endif






@endsection
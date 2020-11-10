@extends('layouts.admin')



@section('content')

    @if($comments)
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>Author</th>
                <th>Email</th>
                <th>Status</th>
                <th>Content</th>
                <th>Created</th>
                <th>updated</th>

            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td><img class="img-rounded" height="50"
                             src="{{$comment->photo ? $comment->photo : 'No Author Photo'}}" alt="">
                    </td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>
                        @if($comment->is_active == 1)

                            {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update',$comment->id]]) !!}
                            {{csrf_field()}}

                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::submit('Un-approve', ['class'=>'btn btn-success']) !!}
                            </div>

                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update',$comment->id]]) !!}
                            {{csrf_field()}}

                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">
                                {!! Form::submit('Approve', ['class'=>'btn btn-info']) !!}
                            </div>

                            {!! Form::close() !!}
                        @endif
                    </td>
                    <td>{{str_limit($comment->body,20)}}</td>
                    <td>{{$comment->created_at->diffForHumans()}}</td>
                    <td>{{$comment->updated_at->diffForHumans()}}</td>
                    <td><a href="{{route('home.post',$comment->post->id)}}">view post</a></td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy',$comment->id]]) !!}
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



    @else

    <h2>No Comments</h2>

    @endif
@endsection


@extends('layouts.admin')



@section('content')

    @if(count($replies) > 0)
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
            @foreach($replies as $reply)
                <tr>
                    <td>{{$reply->id}}</td>
                    <td><img class="img-rounded" height="50"
                             src="{{$reply->photo ? $reply->photo : 'No Author Photo'}}" alt="">
                    </td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>
                        @if($reply->is_active == 1)

                            {!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update',$reply->id]]) !!}
                            {{csrf_field()}}

                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::submit('Un-approve', ['class'=>'btn btn-success']) !!}
                            </div>

                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update',$reply->id]]) !!}
                            {{csrf_field()}}

                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">
                                {!! Form::submit('Approve', ['class'=>'btn btn-info']) !!}
                            </div>

                            {!! Form::close() !!}
                        @endif
                    </td>
                    <td>{{str_limit($reply->body,20)}}</td>
                    <td>{{$reply->created_at->diffForHumans()}}</td>
                    <td>{{$reply->updated_at->diffForHumans()}}</td>
                    <td><a href="{{route('home.post',$reply->comment->post->id)}}">view post</a></td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['CommentRepliesController@destroy',$reply->id]]) !!}
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

        <h2>No Replies</h2>

    @endif
@endsection


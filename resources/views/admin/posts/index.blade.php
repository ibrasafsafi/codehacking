@extends('layouts.admin')

@section('content')

    @if(Session::has('post_deleted'))
        <p class="bg-danger">{{session('post_deleted')}}</p>
    @endif


    <div>
        <h2> POSTS </h2>

        <table class="table table-hover table-borderedd">
            <thead class="thead-dark">
            <tr>
                <th>id</th>
                <th>Photo</th>
                <th>Title</th>
                <th>Body</th>
                <th>Author</th>
                <th>Category</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
            </thead>
            <tbody>
            @if($posts)
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td><img class="img-rounded" height="50" src="{{$post->photo ? $post->photo->file : "http://placehold.it/50x50"}}" alt=""></td>
                        <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->title}}</a></td>
                        <td>{{str_limit($post->body,20)}}</td>
                        <td>{{$post->user ? $post->user->name : "This Post Has No User"}}</td>
                        <td>{{$post->category ? $post->category->name : "Uncategorized"}}</td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td>{{$post->updated_at->diffForHumans()}}</td>
                        <td><a href="{{route('home.post',$post->id)}}">view post</a></td>
                        <td><a href="{{route('admin.comments.show',$post->id)}}">view comments</a></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render()}}
        </div>
    </div>

@endsection
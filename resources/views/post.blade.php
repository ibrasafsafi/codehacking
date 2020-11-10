@extends('layouts.blog-post')


@section('content')


    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/900x300'}}" alt="">

    <hr>

    <!-- Post Content -->
    <p class="">{{$post->body}}</p>
    <hr>

    <!-- Blog Comments -->
    @if(Session::has('comment_message'))
        <p class="bg-success">{{session('comment_message')}}</p>

    @endif
    <!-- Comments Form -->

    <div class="well">
        <h4>Leave a Comment:</h4>
        {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}

        {{csrf_field()}}

        <input type="hidden" name="post_id" value="{{$post->id}}">

        <div class="form-group">
            {!! Form::label('body','Your Comment:') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control ', 'rows'=>3]) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Post Comment', ['class'=>'btn btn-primary']) !!}
        </div>


        {!! Form::close() !!}
    </div>

    <hr>

    <!-- Posted Comments -->

    @if($comments)
        @foreach($comments as $comment)
            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object img-circle" height="50" src="{{$comment->photo}} {{--Auth::user()->gravatar--}}" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$comment->author}}
                        <small>{{$comment->created_at}}</small>
                    </h4>
                {{$comment->body}}

                <!-- Nested Comment -->

                    @if($comment->replies)
                        @foreach($comment->replies as $reply)
                            @if($reply->is_active == 1)
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object img-circle" height="40" src="{{$reply->photo}}" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$reply->author}}
                                            <small>{{$reply->created_at}}</small>
                                        </h4>
                                        {{$reply->body}}
                                    </div>
                                </div>
                        @endif
                    @endforeach
                @endif
                <!-- End Nested Comment -->

                    <div class="comment-reply-container">
                        <button class="toggle-reply btn btn-primary pull-right">Reply</button>
                        <div class="comment-reply">

                            {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}
                            {{csrf_field()}}

                            <input type="hidden" name="comment_id" value="{{$comment->id}}">
                            <br>
                            <div class="form-group">
                                {!! Form::label('body','Your Reply:') !!}
                                {!! Form::textarea('body', null, ['class'=>'form-control ', 'rows'=>1]) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
                            </div>

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif


            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci
                        accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>


                @endsection

                @section('scripts')

                    <script>
                        $(".comment-reply-container .toggle-reply").click(function () {
                            $(this).next().slideToggle("slow");
                        });


                    </script>

@endsection
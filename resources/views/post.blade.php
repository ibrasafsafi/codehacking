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
                    <img class="media-object img-circle" height="50" src="{{$comment->photo ? $comment->photo : ''}} Auth::user()->gravatar" alt="">
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

    {{--<div id="disqus_thread"></div>
    <script>

        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://EXAMPLE.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

    <script id="dsq-count-scr" src="//codehacking.disqus.com/count.js" async></script>--}}


@include('includes.home_side_bar')

                @endsection

                @section('scripts')

                    <script>
                        $(".comment-reply-container .toggle-reply").click(function () {
                            $(this).next().slideToggle("slow");
                        });


                    </script>

@endsection
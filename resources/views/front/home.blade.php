@extends('layouts.blog-home')

@section('content')

    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            {{--<h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>--}}
@if(count($posts)>0)
    @foreach($posts as $post)
            <!-- First Blog Post -->
                <h2>
                    <a href="#">{{$post->title}}</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">{{$post->user->name}}</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> {{$post->created_at}}</p>
                <hr>
                <img class="img-responsive" height="100" src="{{$post->photo ? $post->photo->file : 'https://placehold.it/900x300'}} " alt="">
                <hr>
                <p>{{$post->body}}.</p>
                <a class="btn btn-primary" href="{{route('home.post',$post->id)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
        @endforeach
@endif
                <hr>

                <div class="row">
                    <div class="col-sm-6 col-sm-offset-5">
                        {{$posts->render()}}
                    </div>
                </div>

                <!-- Pager -->
                {{--<ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>--}}

            </div>

            <!-- Blog Sidebar Widgets Column -->
            @include('includes.home_side_bar')

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->

        <!-- /.container -->



@endsection

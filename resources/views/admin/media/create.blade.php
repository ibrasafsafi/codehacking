@extends('layouts.admin')

@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css">

@stop


@section('content')

    <h2>Upload Media</h2>

{!! Form::open(['method'=>'POST', 'action'=>'AdminMediaController@store','class'=>'dropzone' ]) !!}

    {{csrf_field()}}

   {{-- <div class="form-group">
        {!! Form::submit('Upload Media', ['class'=>'btn btn-primary']) !!}
    </div>--}}



{!! Form::close() !!}



@endsection


@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.js"></script>

@endsection
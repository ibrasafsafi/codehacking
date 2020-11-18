@extends('layouts.admin')

@section('content')

    <h2 class=" ">MEDIA</h2>

    @if($medias)
        <form action="/delete/media" method="post" class="form-inline">
            {{method_field('delete')}}
            <div class="form-group">
                <select name="checkBoxArray" id="" class="form-control">
                    <option value="delete">Delete</option>
                </select>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-danger">
            </div>


            <div class=" ">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th><input type="checkbox" id="option"></th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Created</th>
                        <th>Updated</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($medias as $media)
                        <tr>
                            <td><input class="checkboxes" type="checkbox" name="checkBoxArray[]" value="{{$media->id}}">
                            </td>
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
        </form>
    @endif


@endsection


@section('scripts')
    <script>
        $('#option').click(function () {
            if(this.checked){
                $('.checkboxes').each(function () {
                    this.checked = true;
                })
            }else{
                $('.checkboxes').each(function () {
                    this.checked = false;
                })
            }
        });

    </script>
@stop

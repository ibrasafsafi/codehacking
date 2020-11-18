@extends('layouts.admin')

@section('content')

    @if(Session::has('user_deleted'))
        <p class="bg-danger">{{session('user_deleted')}}</p>
    @endif


    <div>
        <h2> USERS </h2>

        <table class="table table-hover table-borderedd">
            <thead class="thead-dark">
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Photo</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
            </thead>
            <tbody>
            @if($users)
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td><a href="{{route('admin.users.edit',$user->id)}}">{{$user->name}}</a></td>
                        <td><img class="img-rounded" height="50" src="{{$user->photo ? $user->photo->file : "No Photo exists"}}" alt=""></td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role ? $user->role->name : 'No Roles'}}</td>
                        <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                        <td>{{$user->created_at ? $user->created_at->diffForHumans() : 'No date'}}</td>
                        <td>{{$user->updated_at ? $user->updated_at->diffForHumans() : 'No date'}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>



@endsection
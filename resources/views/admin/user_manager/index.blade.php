@extends('layouts.mainlayout_admin2')

@section('content')
{{-- {{dd($users)}} --}}

<div class="container">
    @if(Session::has('message'))
    <div class="alertv alert-info">{{Session::get('message')}}</div>
    @endif()
<div class="card-header  mt-5">
    <h6 class="text-uppercase mb-0">User Manager :</h6>

    <div class="row mb-0">
  <div class="col-9 align-self-center">
    {{-- <a href="/users/create" name="add_user" id="add_user" class="btn btn-primary"><i class="fa fa-plus"></i>Add
        User</span></a> --}}
</div>

<div class="col-3 align-self-center">
    <form action="/searchuser" method="GET">
        <div class="input-group">
            <div id="" class="float-right">Search:<label>
                <span class="input-group-prepend ml-3">
                    <input type="search" name="search" class="form-control">
                    <button type="submit" class="btn btn-primary">Search</button>
                </span>
                </label>
            </div>
        </div>
    </form>
</div>
</div>
</div>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Profile</th>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Phone</th>
                <th scope="col">E-mail</th>
                <th scope="col">Status</th>
                <th scope="col">Created_at</th>
                <th scope="col"></th>
            </tr>
        </thead>

        <tbody>

            @foreach ($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td><img src="{{$user->avatar}}" width="100" /></td>
                <td><a href="/users/{{$user->id}}">{{$user->name}}</a></td>
                <td>{{$user->gender}}</td>
                <td>{{$user->phone}} </td>
                <td>{{$user->email}} </td>
                <td>@if ($user->type ==2)
                    Super Admin
                    @elseif ($user->type ==1)
                    Admin
                    @else
                    User
                    @endif </td>
                <td>{{$user->created_at}}</td>

                <td>
                    @can('isSuperAdmin')
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ URL::to('users/' . $user->id . '/edit')}}">
                            <button type="button" class="btn btn-warning">Edit</button>
                        </a>
                        <form action="{{action('UserContoller@destroy', [$user->id])}} " method="POST">
                            <input type="hidden" name="_method" value="delete">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </div>
                    @endcan
                </td>
            </tr>

@endforeach
</tbody>
</table>
{{ $users->links() }}
@endsection

@can('isSuperAdmin')
@extends('layouts.mainlayout_admin2')

@section('content')
<div class="container">
    <div class="row mb-0">
        <div class="col-9 align-self-center">
            <h2>
                <span class="text-capitalize">Status Manager:</span>
            </h2>
        </div>
        <div class="col-3">
            <form action="/searchtype" method="GET">
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
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Profile</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td><img src="{{$user->avatar}}" width="100" /></td>
                <td>{{$user->name}}</td>
                <td>
                    @if ($user->type ==2)
                    Super Admin
                    @elseif ($user->type ==1)
                    Admin
                    @else
                    User
                    @endif
                </td>


                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ URL::to('type/' . $user->id . '/edit')}}">
                            <button type="button" class="btn btn-warning">Edit</button>
                        </a>
                        <form action="{{action('UserContoller@destroy', [$user->id])}} " method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $users->links() }}
@endsection
@endcan

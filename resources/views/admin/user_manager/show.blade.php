@extends('layouts.mainlayout_admin2')

@section('content')
<div class="container mt-3">
    <h1>Profile</h1>
    <div class="jumbotron">
        <p>
            <strong >Images : </strong> <br>
            <img class="mt-3 my-3" src="<?php echo asset($user->avatar);  ?>" width="500" alt=""> <br>
            <strong >User :</strong> {{$user->name}} <br>
            <strong>Gender :</strong> {{$user->gender}} <br>
            <strong>Phone Number :</strong> {{$user->phone}} <br>
            <strong>E-mail :</strong> {{$user->email}} <br>
            <strong>Status :</strong>
            @if ($user->type ==2)
            Super Admin
            @elseif ($user->type ==1)
            Admin
            @else
            User
            @endif
            <br>
        </p>
    </div>
</div>

@endsection

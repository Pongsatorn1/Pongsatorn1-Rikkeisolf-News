
@extends('layouts.mainlayout_admin2')
<div class="container">
    <h1>Add New Users</h1>
    <hr>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="/users" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="avatar">File Uploading image Your Profile</label>
            <input type="file" name="avatar" class="form-control">
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name	">
        </div>

        <div class="form-group row">
            <label for="gender" class="col-sm-4 col-md-4 control-label text-right">Gender</label>
            <div class="col-md-6">
                <select class="browser-default custom-select" name="gender" value="gender" id="gender">
                    <option selected>Open this select menu</option>
                    <option value="male">Male</option>
                    <option value="famale">Female</option>
                </select>
                @if ($errors->has('genger'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('gender') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <textarea name="phone" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <textarea class="form-control" id="email"  name="email"></textarea>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <textarea class="form-control" id="password"  name="password"></textarea>
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

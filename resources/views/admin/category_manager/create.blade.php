@extends('layouts.mainlayout_admin2')

@section('content')
<div class="container mt-5">
    <h1>Add New Category</h1>
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

    <form action="/categorys" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Name Category : </label>
            <input type="text" class="form-control" name="name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


@endsection

@extends('layouts.mainlayout_admin2')

@section('content')
<div class="container">
    <h1>Edit Category </h1>
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
    <form action="{{ url('categorys',  [$category->id]) }}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        @csrf

        <div class="form-group">
            <label for="story">Name Category :</label>
            <textarea class="form-control " id="Name_category" rows="1"
                name="name">{{$category->name}}</textarea>
        </div>

<button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
@endsection

@extends('layouts.mainlayout_admin2')

@section('content')
<div class="container-fuid mt-5 ">
    <h1 class="ml-3">Show Article :</h1>

    <div class="jumbotron">
            <h1>Title : {{$article->title}}</h1>
            <p>{{$article->created_at}}</p>
            <p>Description : <br> {{$article->description}}</p>
            <hr>
            <p class="lead">Story : <br> {!!$article->story!!}</p>
            <strong>Images : </strong> <br>
            <img src="<?php echo asset($article->imagenews);  ?>" width="900" alt=""> <br>
    </div>
</div>

@endsection

@extends('layouts.mainlayout_admin2')

@section('content')
<div class="container my-5">
    <div id="app">
        <div>
            <h1 class="mt-5">Title : {{$video->title_video}}</h1>
            <p>{{$video->created_at}}</p>
            <p>Description : <br> {{$video->description_video}}</p>
            <hr>
            <strong>Video : </strong> <br>
            <video class="card-img-top" controls="controls">
                <source src="{{ url($video->namesvideo) }}" type="video/mp4" />
                </video>
                <br>
                <p class="lead">Story : <br> {!!$video->story_video!!}</p>
        </div>


    </div>
</div>
@endsection

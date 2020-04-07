@extends('layouts.mainlayout_admin2')

@section('content')
<div class="container">
    <h1>Show Article : {{$populararticle->article['title']}}</h1>

    <div class="jumbotron text-center">
        <p>
            <strong>Article Title :</strong> {{$populararticle->article['title']}} <br>
            <strong>Article Description : </strong> {{$populararticle->article['description']}} <br>
            <strong>Article story :</strong> {!!$populararticle->article['story']!!} <br>
            <strong>Images : </strong> <br>
            <img src="<?php echo asset($populararticle->article['imagenews']);  ?>" width="900" alt=""> <br>

            <strong>Article Favorite : </strong> {{$populararticle->article['favoritescount']}}
        </p>
    </div>
</div>

@endsection

@extends('layouts.mainlayout_admin2')

@section('content')

<div class="container mt-3">
    @if(Session::has('message'))
    <div class="alertv alert-info">{{Session::get('message')}}</div>
    @endif()

    <div class="card-header  mt-5">
        <div class="row mb-0">
      <div class="col-9 align-self-center">
        <h3 class="text-uppercase mb-0">Popular Manager:</h3>
    </div>

    <div class="col-3 align-self-center">
        <form action="/searcharticle" method="GET">
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


    <table class="table-responsive-md table table-striped table-hover card-text">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                {{-- <th scope="col">Story</th> --}}
                <th scope="col">Category</th>
                <th scope="col">Author</th>
                <th scope="col">Createtime</th>
                {{-- <th scope="col">FavoritesCount</th> --}}
                <th scope="col">ImageNews</th>
                <th scope="col"></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($populararticle as $article)
            <tr>
                <td class="font-weight-bold">{{$article->id}}</td>
                <td><a href="/populararticle/{{$article->id}}">{{$article->article['title']}}</a></td>
                <td class="text-wrap text-break">{!!Str::limit($article->article['description'], 150)!!}</td>
                {{-- <td class="text-wrap text-break">{!!Str::limit($article->article['story'], 150)!!}</td> --}}
                <td>{{ $article->article->Category['name'] }}</td>
                 <td>{{ $article->article->users['name'] }}</td>
                <td>{{$article->article['created_at']->toFormattedDateString()}}</td>
                {{-- <td align="center">{{$article->article['favoritescount']}}</td> --}}
                <td><img src="{{$article->article['imagenews']}}" width="250" /></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ URL::to('edit_show/' . $article->id)}}">
                            <button type="button" class="btn btn-warning">Change</button>
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection



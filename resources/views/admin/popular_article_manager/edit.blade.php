@extends('layouts.mainlayout_admin2')

@section('content')
<div class="container">
    @if(Session::has('message'))
    <div class="alertv alert-info">{{Session::get('message')}}</div>
    @endif()
        {{-- <h2>
            <span class="text-capitalize">Article Manager</span>
        </h2>

        <div class="row mb-0">
            <div class="col-9 align-self-center">
                <a href="/articles/create" name="add_articles" id="add_articles" class="btn btn-primary"><i class="fa fa-plus"></i>Add
                    Article</span></a>
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
</div> --}}
<div class="card-header  mt-5">


    <div class="row mb-0">
  <div class="col-9 align-self-center">
    <h6 class="text-uppercase mb-0">Change Popular Manager :</h6>
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

    <table class=" table-responsive-md table table-striped table-hover card-text">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                {{-- <th scope="col">Story</th> --}}
                <th scope="col">Category</th>
                <th scope="col">Author</th>
                {{-- <th scope="col">Createtime</th> --}}
                <th scope="col">ImageNews</th>
                <th scope="col"></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($articles as $article)
            <tr>
                <td class="font-weight-bold">{{$article->id}}</td>
                <td><a href="/articles/{{$article->id}}">{{$article->title}}</a></td>
                <td class="text-wrap text-break">{!!Str::limit($article->description, 150)!!}</td>
                {{-- <td class="text-wrap text-break">{!!Str::limit($article->story, 150)!!}</td> --}}
                <td>{{ $article->category['name'] }}</td>
                <td>{{ $article->users['name'] }}</td>
                {{-- <td>{{$article->created_at->toFormattedDateString()}}</td> --}}
                <td><img src="{{ url($article->imagenews)}}" width="250" /></td>
                <td>
                    <a href="/vote_popular/{{ $id.'_'.$article->id }}" class="btn btn-success">Select</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
{{ $articles->links() }}
@endsection



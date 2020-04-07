@extends('layouts.mainlayout_user')

@section('content')
<header>
<nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow"><a href="#" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead"><i></i>  <img class="ml-3" src="<?php echo asset('img/logo.svg'); ?>" alt="Rikeisolf"></a>
    <a class="nav-link navbar"  href="/">Home <span class="sr-only">(current)</span></a>
    <a class="nav-link navbar"  href="news">News</a>
    <a class="nav-link navbar"  href="video_all">Video</a>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle navbar"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Category
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach($categorys as $category)
          <a class="dropdown-item" href="/category/{{$category->id}}" value="{{$category->id}}">{{$category->name}}</a>
          @endforeach
        </div>
      </li>
      <a class="nav-link navbar"  href="/showcontact">Contact</a>
    <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
      <li class="nav-item">
        <form id="searchForm"  action="/searchshowarticle" method="GET" class="ml-auto d-none d-lg-block">
          <div class="form-group position-relative mb-0">
            <button type="submit" style="top: -3px; left: 0;" class="position-absolute bg-white border-0 p-0"><i class="o-search-magnify-1 text-gray text-lg"></i></button>
            <input type="search" name="search" placeholder="Search ..." class="form-control form-control-sm border-0 no-shadow pl-4">
          </div>
        </form>
      </li>
      @guest
            <li class="nav-item">
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('login') }}">Sign up</a>
                </li>
                @else
      <li class="nav-item dropdown ml-auto"><a id="userInfo" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
        <img src="{{asset(Auth::user()->avatar)}}" style="height:50px;width:50px; border-radius : 50% "
        alt="" ></a>
        <div aria-labelledby="userInfo" class="dropdown-menu"><a href="#" class="dropdown-item"><strong class="d-block text-uppercase headings-font-family">{{ Auth::user()->name  }}</strong>
            <small> @if (Auth::user()->type ==2)
                Super Admin
                @elseif (Auth::user()->type ==1)
                Admin
                @else
                User
                @endif</small>
            </a>
            <div class="dropdown-divider"></div><a href="my_favorites" class="dropdown-item">My Favorite</a>
          <div class="dropdown-divider"></div><a href="profile/{{$user->id}}" class="dropdown-item">Profile</a><a href="{{ URL::to('user/' . $user->id)}}" class="dropdown-item">Settings</a>
          <div class="dropdown-divider">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
              </div><a href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();" class="dropdown-item">{{ __('Logout') }}</a>
        </div>
      </li>
      @endguest
    </ul>
  </nav>
</header>

{{-- <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
        @foreach ($categorys as $category)
        <a class="p-2 text-muted" href="#">{{$category->name}}</a>
        @endforeach
    </nav>
</div> --}}

<div class="container-fuild mx-5">
    <h2 class="pt-5 ml-1">POPULAR NEWS :</h2>
    <br>
    {{-- start popular --}}
    <div class="container-fuild mx-5">
        {{-- @foreach ($populararticles as $populararticle) --}}
        <div class="row row-cols-1 row-cols-md-2">

            <div class="col-md-8">
                {{-- <div class="container"> --}}
                <a href="/article_show/{{$populararticle1->article['id']}}">
                    <div class="text-white ">
                        <img class="bg-grad brightness-68 mainconfixlayout"src="{{$populararticle1->article['imagenews']}}"
                            alt="Imagenews">
                        <div class="card-img-overlay ml-3" style="margin-top:25%;">
                            <h3 class="card-title">{{$populararticle1->article['title']}}</h3>
                            <p class="card-text text-white">{!!Str::limit($populararticle1->article['description'], 150)!!}</p>
                            <ul class="list-li-mr-20">
                                <li>
                                    by
                                    <span class="color-primary">

                                        <b>{{$populararticle1->article->users['name']}}</b>
                                    </span>
                                    {{$populararticle1->article['created_at']->toFormattedDateString()}}
                                </li>
                            </ul>

                        </div>
                    </div>
                </a>
                {{-- </div> --}}
            </div>

            {{-- col-2 --}}
            <div class="col-md-4">
                <div class="row">
                    <div class="container mb-3">
                        <a href="/article_show/{{$populararticle2->article['id']}}">
                            <div class="text-white">
                                <img class="bg-grad brightness-68 mainconfixlayoutmini"
                                src="<?php echo asset($populararticle2->article['imagenews']);  ?>" alt="">
                                <div class="card-img-overlay ml-3" style="margin-top:17%;">
                                    <h3 class="card-title">{{$populararticle2->article['title']}}</h3>
                            <p class="card-text text-white">{!!Str::limit($populararticle2->article['description'], 70)!!}</p>
                                    <ul class="list-li-mr-20">
                                        <li>
                                            by
                                            <span class="color-primary">
                                                <b>{{$populararticle2->article->users['name']}}</b>
                                            </span>
                                            {{$populararticle2->article['created_at']->toFormattedDateString()}}
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="container mt-2 mb-3">
                        <a href="/article_show/{{$populararticle3->article['id']}}">
                            <div class="text-white">
                                <img class="bg-grad brightness-68 mainconfixlayoutmini"
                                src="<?php echo asset($populararticle3->article['imagenews']);  ?>" alt="">
                                <div class="text-left-under ml-3 mb-5 pb-3">
                                    <h3 class="card-title">{{$populararticle3->article['title']}}</h3>
                                    <p class="card-text text-white">{!!Str::limit($populararticle3->article['description'], 70)!!}</p>
                                    <ul class="list-li-mr-20">
                                        <li>
                                            by
                                            <span class="color-primary">
                                                <b>{{$populararticle3->article->users['name']}}</b>
                                            </span>
                                            {{$populararticle3->article['created_at']->toFormattedDateString()}}
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- row 2 --}}
        <div class="row row-cols-1 row-cols-md-3 mt-2">
            <div class="col-md-4">
                {{-- <div class="container"> --}}
                    <a href="/article_show/{{$populararticle4->article['id']}}">
                    <div class="text-white">
                        <img class="bg-grad brightness-68 mainconfixlayoutmini" src="<?php echo asset($populararticle4->article['imagenews']);  ?>"
                            alt="">
                        <div class="card-img-overlay ml-3" style="margin-top:17%;">
                            <h3 class="card-title">{{$populararticle4->article['title']}}</h3>
                            <p class="card-text text-white">{!!Str::limit($populararticle4->article['description'], 70)!!}</p>
                            <ul class="list-li-mr-20">
                                <li>
                                    by
                                    <span class="color-primary">
                                        <b>{{$populararticle4->article->users['name']}}</b>
                                    </span>
                                    {{$populararticle4->article['created_at']->toFormattedDateString()}}
                                </li>
                            </ul>

                        </div>
                    </div>
                </a>
                {{-- </div> --}}
            </div>

            <div class="col-md-4">
                {{-- <div class="container"> --}}
                    <a href="/article_show/{{$populararticle5->article['id']}}">
                    <div class="text-white">
                        <img class="bg-grad brightness-68 mainconfixlayoutmini" src="<?php echo asset($populararticle5->article['imagenews']);  ?>"
                            alt="">
                        <div class="card-img-overlay ml-3" style="margin-top:17%;">
                            <h3 class="card-title">{{$populararticle5->article['title']}}</h3>
                            <p class="card-text text-white">{!!Str::limit($populararticle5->article['description'], 70)!!}</p>
                            <ul class="list-li-mr-20">
                                <li>
                                    by
                                    <span class="color-primary">
                                        <b>{{$populararticle5->article->users['name']}}</b>
                                    </span>
                                    {{$populararticle5->article['created_at']->toFormattedDateString()}}
                                </li>
                            </ul>

                        </div>
                    </div>
                </a>
                {{-- </div> --}}
            </div>

            <div class="col-md-4">
                {{-- <div class="container"> --}}
                    <a href="/article_show/{{$populararticle6->article['id']}}">
                    <div class="text-white">
                        <img class="bg-grad brightness-68 mainconfixlayoutmini" src="<?php echo asset($populararticle6->article['imagenews']);  ?>"
                            alt="">
                        <div class="card-img-overlay ml-3" style="margin-top:17%;">
                            <h3 class="card-title">{{$populararticle6->article['title']}}</h3>
                            <p class="card-text text-white">{!!Str::limit($populararticle6->article['description'], 70)!!}</p>
                            <ul class="list-li-mr-20">
                                <li>
                                    by
                                    <span class="color-primary">
                                        <b>{{$populararticle6->article->users['name']}}</b>
                                    </span>
                                    {{$populararticle6->article['created_at']->toFormattedDateString()}}
                                </li>
                            </ul>

                        </div>
                    </div>
                </a>
                {{-- </div> --}}
            </div>
        </div>
        {{-- @endforeach --}}
    </div>
{{-- end popular --}}



    {{-- new article  --}}
    <main role="main" class="container-fuild mx-5 mt-5 pt-10">
        <div class="row">
            <div class="col-sm-8">
                <div class="blog-post">
                    <h2 class="blog-post-title">News Article</h2>
                    <p class="blog-post-meta" id="today"></p>

                    <hr>

                    @foreach ($articles as $article)
                    <div class="card mb-3">
                        <a href="/article_show/{{$article->id}}">
                            <div class="row no-gutters text-dark">

                                <div class="col-md-3">

                                    <img class="mainconfixlayoutmicro" src="{{ asset($article->imagenews) }}" alt="Imagenews">
                                    {{-- <svg class="bd-placeholder-img" width="100%" height="250" xmlns="" aria-label="Placeholder: Image" preserveAspectRatio="xMidYMid slice" role="img"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image</text></svg> --}}
                                </div>
                                <div class="col-md-9 ">
                                    <div class="card-body ml-5">
                                        <h5 class="card-title">{{$article->title}}</h5>
                                        <p class="card-text">{{$article->description}}</p>
                                        <p class="card-text"><small class="text-muted">{{$article->created_at->toFormattedDateString()}}</small>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    <br>
                    <hr>
                </div>
            </div>

            <div class="col-sm-4">

            </div>

        </div>
    </main>

</div>


<h1 class="pt-5 ml-1">Watching Video :</h1>
<br>
<div class="container-fuild mx-5">
    <div class="card-group">
@foreach ($videos as $video)
<div class="col col-lg-3 ">
    <div class="card ">
        <p><video class="card-img-top mainconfixlayoutmini" controls="controls">
           <source src="{{$video->namesvideo}}" type="video/mp4" />
        </video></p>
        <a href="/video_show/{{$video->id}}">
      <div class="card-body">
        <h5 class="card-title">{{$video->title_video}}</h5>
        <p class="card-text">{{$video->description_video}}</p>
      </div>
      <div class="card-footer">
        <small class="text-muted">{{$video->created_at->toFormattedDateString()}}
        </small>
      </div>
    </a>
    </div>
</div>
  <!--Card-->

@endforeach

</div>

</div>

<script>
    var d = new Date();
    document.getElementById("today").innerHTML = d;
    </script>

@endsection







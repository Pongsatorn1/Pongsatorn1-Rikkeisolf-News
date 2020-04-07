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

<div class="container">
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


<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

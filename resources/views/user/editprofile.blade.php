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
    <div class="row justify-content-center mt-5 pt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User</div>
                <div class="card-body">
                    <form method="post" action="{{route('users.update', $user)}}">
                        {{--  <input type="hidden" name="_method" value="PUT">  --}}
                        {{ method_field('patch') }}
                        @csrf
                        <div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">Please uplode your profile
                                <br>
                                <span class="text-small text-info">*Not required</span>
                            </label>

                            <div class="col-md-6">
                                <input type="file" value="{{$user->avatar}}" name="avatar" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-sm-4 col-md-4 control-label text-right">Gender</label>
                            <div class="col-md-6">
                                <select class="browser-default custom-select" name="gender" value="gender" id="gender">
                                    <option selected>Open this select menu</option>
                                    <option value="male">Male</option>
                                    <option value="Famale">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone"
                                class="col-md-4 col-form-label text-md-right">{{ __('Phone number') }}</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone"
                                    value="{{$user->phone}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email"
                                    value="{{$user->email}}">
                            </div>
                        </div>

                        <div class="form-group row pt-2">
                            <div class="col-md-8"></div>
                            <div class="col-md-4 ">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endsection

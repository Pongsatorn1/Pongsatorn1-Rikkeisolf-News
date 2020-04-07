    <title>{{config('app.name')}}</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Expanded:400,600,700" rel="stylesheet">
    <!-- Stylesheets -->

    <link href="{{asset('fonts/ionicons.css')}}	" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{asset('common/styles.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- Bootstrap core CSS -->





    <div class="container-fuild">
        <div
            class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <a class="my-0 mr-md-auto" href="/home"> <img src="<?php echo asset('img/logo.svg'); ?>"></a>


            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('login') }}">Sign up</a>
                </li>
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img src="{{asset(Auth::user()->avatar)}}"
                            style="height:35px;width:35; border-radius : 50%  margin-rigth:15px;" alt="">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>

    <div class="container">



        <main role="main" class="container-fuild mx-5 mt-5 pt-10">
            <div class="row">
                <div class="col-sm-8">
                    <div class="blog-post">
                        <h2 class="blog-post-title">Sample blog post</h2>
                        <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p>

                        <div class="container"></div>
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{ asset($article->imagenews) }}" class="bd-placeholder-img" height="100%"
                                        alt="Imagenews">
                                    <svg class="bd-placeholder-img" width="100%" height="250" xmlns=""
                                        aria-label="Placeholder: Image" preserveAspectRatio="xMidYMid slice" role="img">
                                        <title>Placeholder</title>
                                        <rect width="100%" height="100%" fill="#868e96" /><text x="50%" y="50%"
                                            fill="#dee2e6" dy=".3em">Image</text>
                                    </svg>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$article->title}}</h5>
                                        <p class="card-text">{{$article->description}}</p>
                                        <p class="card-text"><small class="text-muted">{{$article->created_at}}</small>
                                        </p>
                                        @if (Auth::check())
                                        <div class="panel-footer">
                                            <favorite :article={{ $article->id }}
                                                :favorited={{ $article->favorited() ? 'true' : 'false' }}></favorite>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{ asset($article->imagenews) }}" class="bd-placeholder-img" height="100%"
                                        alt="Imagenews">
                                    <svg class="bd-placeholder-img" width="100%" height="250" xmlns=""
                                        aria-label="Placeholder: Image" preserveAspectRatio="xMidYMid slice" role="img">
                                        <title>Placeholder</title>
                                        <rect width="100%" height="100%" fill="#868e96" /><text x="50%" y="50%"
                                            fill="#dee2e6" dy=".3em">Image</text>
                                    </svg>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$article->title}}</h5>
                                        <p class="card-text">{{$article->description}}</p>
                                        <p class="card-text"><small class="text-muted">{{$article->created_at}}</small>
                                        </p>
                                        @if (Auth::check())
                                        <div class="panel-footer">
                                            <favorite :article={{ $article->id }}
                                                :favorited={{ $article->favorited() ? 'true' : 'false' }}></favorite>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{ asset($article->imagenews) }}" class="bd-placeholder-img" height="100%"
                                        alt="Imagenews">
                                    {{-- <svg class="bd-placeholder-img" width="100%" height="250" xmlns="" aria-label="Placeholder: Image" preserveAspectRatio="xMidYMid slice" role="img"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image</text></svg> --}}
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$article->title}}</h5>
                                        <p class="card-text">{{$article->description}}</p>
                                        <p class="card-text"><small class="text-muted">{{$article->created_at}}</small>
                                        </p>
                                        @if (Auth::check())
                                        <div class="panel-footer">
                                            <favorite :article={{ $article->id }}
                                                :favorited={{ $article->favorited() ? 'true' : 'false' }}></favorite>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{ asset($article->imagenews) }}" class="bd-placeholder-img" height="100%"
                                        alt="Imagenews">
                                    {{-- <svg class="bd-placeholder-img" width="100%" height="250" xmlns="" aria-label="Placeholder: Image" preserveAspectRatio="xMidYMid slice" role="img"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image</text></svg> --}}
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$article->title}}</h5>
                                        <p class="card-text">{{$article->description}}</p>
                                        <p class="card-text"><small class="text-muted">{{$article->created_at}}</small>
                                        </p>
                                        @if (Auth::check())
                                        <div class="panel-footer">
                                            <favorite :article={{ $article->id }}
                                                :favorited={{ $article->favorited() ? 'true' : 'false' }}></favorite>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{ asset($article->imagenews) }}" class="bd-placeholder-img" height="100%"
                                        alt="Imagenews">
                                    {{-- <svg class="bd-placeholder-img" width="100%" height="250" xmlns="" aria-label="Placeholder: Image" preserveAspectRatio="xMidYMid slice" role="img"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image</text></svg> --}}
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$article->title}}</h5>
                                        <p class="card-text">{{$article->description}}</p>
                                        <p class="card-text"><small class="text-muted">{{$article->created_at}}</small>
                                        </p>
                                        @if (Auth::check())
                                        <div class="panel-footer">
                                            <favorite :article={{ $article->id }}
                                                :favorited={{ $article->favorited() ? 'true' : 'false' }}></favorite>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gel-layout__item nw-c-slice-heading gs-u-pb+ gs-u-display-inline-block gel-1/1">
                        <div class="nw-c-slice-heading__title gs-u-float-left gs-u-pr+">
                            <h2 id="nw-c-Watch/Listen__title" class="gel-double-pica">Watch/Listen</h2>
                        </div>
                    </div>
                    <hr>

                </div>

                <div class="col-sm-4">
                    <aside class="blog-sidebar mt-5 pt-25">
                        <div class="p-3 mb-3 bg-light rounded">
                            <h4 class="font-italic">About</h4>
                            <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis
                                consectetur
                                purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                        </div>

                        <div class="p-3">
                            <h4 class="font-italic">Archives</h4>
                            <ol class="list-unstyled mb-0">
                                <li><a href="#">March 2014</a></li>
                                <li><a href="#">February 2014</a></li>
                                <li><a href="#">January 2014</a></li>
                                <li><a href="#">December 2013</a></li>
                                <li><a href="#">November 2013</a></li>
                                <li><a href="#">October 2013</a></li>
                                <li><a href="#">September 2013</a></li>
                                <li><a href="#">August 2013</a></li>
                                <li><a href="#">July 2013</a></li>
                                <li><a href="#">June 2013</a></li>
                                <li><a href="#">May 2013</a></li>
                                <li><a href="#">April 2013</a></li>
                            </ol>
                        </div>

                        <div class="p-3">
                            <h4 class="font-italic">Elsewhere</h4>
                            <ol class="list-unstyled">
                                <li><a href="#">GitHub</a></li>
                                <li><a href="#">Twitter</a></li>
                                <li><a href="#">Facebook</a></li>
                            </ol>
                        </div>
                    </aside><!-- /.blog-sidebar -->

                </div>

            </div>
        </main>
    </div>




    <div class="col-md-8">
        <div class="row">
            <div class="col">
                <a href="/home/{{$article->id}}">
                    <div class="card text-white text-justify text-justify">
                        <img src="{{ asset($article->imagenews) }}" class="img-fluid" alt="Imagenews" width="40"
                            height="345">
                        <div class="card-img-overlay">
                            <h3 class="card-title">{{$article->title}}</h3>
                            <p class="card-text text-white">{{$article->description}}</p>
                            <ul class="list-li-mr-20">
                                <li>
                                    by
                                    <span class="color-primary">
                                        <b>{{$article->author}}</b>
                                    </span>
                                    {{$article->created_at}}
                                </li>
                            </ul>
                            @if (Auth::check())
                            <div class="panel-footer">
                                <favorite :article={{ $article->id }}
                                    :favorited={{ $article->favorited() ? 'true' : 'false' }}></favorite>
                            </div>
                            @endif
                        </div>
                    </div>
                </a>
            </div>
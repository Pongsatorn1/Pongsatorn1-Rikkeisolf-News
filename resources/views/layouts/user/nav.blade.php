<header>
    <div class="container-fuild">
        <div
            class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <a class="my-0 mr-md-auto" href="/home"> <img src="<?php echo asset('img/logo.svg'); ?>"></a>
            @foreach ($categorys as $category)
                {{ dd($category) }}
            @endforeach

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
                        <img src="{{asset(Auth::user()->avatar)}}" style="height:50px;width:50px; border-radius : 50% "
                            alt=""> {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="my_favorites">
                            My Favorite
                        </a>
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
</header>

{{-- <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
        @foreach ($categorys as $category)
        <a class="p-2 text-muted" href="#">{{$category->name}}</a>
        @endforeach
    </nav>
</div> --}}
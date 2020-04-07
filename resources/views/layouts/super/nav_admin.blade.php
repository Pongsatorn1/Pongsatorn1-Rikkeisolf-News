    <!-- navbar-->
    <header class="header">
        <nav class="navbar navbar-expand-lg   px-4 py-2 bg-white shadow"><a href="#" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead"><i class="fas fa-align-left"></i>  <img class="ml-3" src="<?php echo asset('img/logo.svg'); ?>" alt="Rikeisolf"></a><a href="index.html" class="navbar-brand font-weight-bold text-uppercase text-base">RikkeiSolf Dashboard</a>
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
              <div class="dropdown-divider"></div><a href="#" class="dropdown-item">Settings</a><a href="#" class="dropdown-item">Activity log       </a>
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
      <div class="d-flex align-items-stretch">
        <div id="sidebar" class="sidebar py-3">
          <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MAIN</div>
          <ul class="sidebar-menu list-unstyled">
            @can('isSuperAdmin')
            <li class="sidebar-list-item"><a href="{{ '/dashboard' }}" class="sidebar-link text-muted"><i class="o-home-1 mr-3 text-gray"></i><span>Dashboard</span></a></li>
            @endcan
            <li class="sidebar-list-item"><a href="/populararticle" class="sidebar-link text-muted"><i class="o-sales-up-1 mr-3 text-gray"></i><span>Popular Article</span></a></li>
            <li class="sidebar-list-item"><a href="/articles" class="sidebar-link text-muted"><i class="o-paperwork-1 mr-3 text-gray"></i><span>Article Manager</span></a></li>
            <li class="sidebar-list-item"><a href="/categorys" class="sidebar-link text-muted"><i class="o-table-content-1 mr-3 text-gray"></i><span>Category Manager</span></a></li>
            <li class="sidebar-list-item"><a href="/videos" class="sidebar-link text-muted"><i class="o-imac-screen-1 mr-3 text-gray"></i><span>Video Manager</span></a></li>
            <li class="sidebar-list-item"><a href="/users" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span>User Manager</span></a></li>
            @can('isSuperAdmin')
            <li class="sidebar-list-item"><a href="/type" class="sidebar-link text-muted"><i class="o-wireframe-1 mr-3 text-gray"></i><span>Change Status</span></a></li>
            @endcan
          </ul>
          <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family"></div>
          <ul class="sidebar-menu list-unstyled">
                <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class=" mr-3 text-gray"></i><span></span></a></li>
                <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class=" mr-3 text-gray"></i><span></span></a></li>
                <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class=" mr-3 text-gray"></i><span></span></a></li>
                <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class=" mr-3 text-gray"></i><span></span></a></li>
                <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class=" mr-3 text-gray"></i><span></span></a></li>
                <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class=" mr-3 text-gray"></i><span></span></a></li>
                <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class=" mr-3 text-gray"></i><span></span></a></li>
                <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class=" mr-3 text-gray"></i><span></span></a></li>
                <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class=" mr-3 text-gray"></i><span></span></a></li>

          </ul>
        </div>

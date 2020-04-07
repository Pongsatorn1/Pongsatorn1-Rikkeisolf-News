<!DOCTYPE html>
<html lang="en">

<head>
    <div class="container">
        @include('layouts.user.head')
    </div>
</head>

<body  class="bodywhlie">
    @can('isAdmin')
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary p-5">
        <a class="navbar-brand mr-auto mr-lg-0" href="articles">Go To Manager System For Admin!</a>
      </nav>dashboard
      @endcan

      @can('isSuperAdmin')
      <nav class="navbar navbar-expand-lg navbar-dark bg-secondary p-5">
          <a class="navbar-brand mr-auto mr-lg-0" href="dashboard">Go To Manager System For SuperAdmin!!</a>
        </nav>
        @endcan
    <main id="app">
        <div class="container-fuild">
            {{-- @include('layouts.user.nav') --}}

            @yield('content')
        </div>
    </main>

    @include('layouts.user.footer')
</body>

</html>

@can('isAdmin')
<!DOCTYPE html>
<html lang="en">

<head>
    <div class="container">
        @include('layouts.super.head_admin')
    </div>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary p-5">
        <a class="navbar-brand mr-auto mr-lg-0" href="/">Go To Homepang</a>
      </nav>
    <main id="app">
        @include('layouts.super.nav_admin')

        @yield('content')


    </main>

    @include('layouts.super.footer_admin')
</body>

</html>
@endcan

@can('isSuperAdmin')
<!DOCTYPE html>
<html lang="en">
<head>
    <div class="container">
        @include('layouts.super.head_admin')
    </div>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary p-5">
        <a class="navbar-brand mr-auto mr-lg-0" href="/">Go To Homepang</a>
      </nav>
    <main id="app">
        @include('layouts.super.nav_admin')

        @yield('content')


    </main>

    @include('layouts.super.footer_admin')
</body>

</html>
@endcan

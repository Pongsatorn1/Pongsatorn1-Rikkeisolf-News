@can('isAdmin')
<!DOCTYPE html>
<html lang="en">

<head>
    <div class="container">
        @include('layouts.admin.head_admin')
    </div>
</head>

<body>
    <main id="app">
        @include('layouts.admin.nav_admin')
{{-- 
        @yield('content') --}}


    </main>

    @include('layouts.admin.footer_admin')
</body>

</html>
@endcan

@can('isSuperAdmin')
<!DOCTYPE html>
<html lang="en">

<head>
    <div class="container">
        @include('layouts.admin.head_admin')
    </div>
</head>

<body>
    <main id="app">
        @include('layouts.admin.nav_admin')

        {{-- @yield('content') --}}


    </main>

    @include('layouts.admin.footer_admin')
</body>

</html>
@endcan

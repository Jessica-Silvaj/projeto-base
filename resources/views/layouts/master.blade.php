<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
  <body class="app sidebar-mini">

    <div class='pre-loader'>
        <div class="c-loader"></div>
    </div>

    <!-- Navbar-->
     @include('layouts.navbar')
    <!-- End Navbar-->

    <!-- Sidebar menu-->
    @include('layouts.sidebar')
    <!-- End Sidebar-->

    {{-- Conteúdo --}}
    @yield('content')
    {{-- End Conteúdo --}}

    <!-- Footer -->
    @include('layouts.footer')
    {{-- End Footer --}}
</body>
</html>

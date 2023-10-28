<!DOCTYPE html>
<html lang="en">
@include('components.admin.head')

<body class="g-sidenav-show  bg-gray-100">
    @include('components.admin.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('components.admin.navbar')
        <div class="container-fluid py-3">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger text-white">
                    {{ session('error') }}
                </div>
            @endif
            @include('components.admin.card')
            @yield('content')
        </div>
        @include('components.admin.footer')
    </main>
    @include('components.admin.script')
</body>

</html>

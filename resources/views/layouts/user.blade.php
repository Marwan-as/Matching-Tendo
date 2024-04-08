<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials._scripts')
</head>

<body>
    @include('partials._header')

    @yield('content')

    @include('partials._footer')

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @if (session('flash_message'))
        <script>
            swal("", "{{ session('flash_message') }}", "success");
        </script>
    @endif
    
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials._scripts-dash')
</head>

<body>
    @include('partials._header-dash')

    @yield ('content')

    @if ($errors->any())
        @foreach ($errors->all() as $error)
        @endforeach
    @endif



    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('flash_message'))
        <script>
            swal("", "{{ session('flash_message') }}", "success");
        </script>
    @endif
</body>

</html>

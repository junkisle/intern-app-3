<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS, icons, etc. -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            @include('partials._sidebar')

            <div class="col-md-9 col-xl-10 ms-auto py-3 ps-md-4">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (for collapse etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

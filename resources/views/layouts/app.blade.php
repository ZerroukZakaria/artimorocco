<!DOCTYPE html>
<html lang="en">
<head>




    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'ArtiMorocco')</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

<link
    rel="stylesheet"
    href="{{ asset('css/app.css') }}"
>

</head>


<body class="d-flex flex-column min-vh-100">

@include('partials.navbar')

<main class="flex-grow-1">

    <div
        class="container-fluid py-4 mx-auto"
        style="max-width:1800px;"
    >
        @yield('content')
    </div>

</main>


@if(session('success'))

<script>

Swal.fire({
    icon: 'success',
    title: 'Success',
    text: '{{ session('success') }}',
    timer: 2000,
    showConfirmButton: false
});

</script>

@endif


@if(session('error'))

<script>

Swal.fire({
    icon: 'error',
    title: 'Error',
    text: '{{ session('error') }}'
});

</script>

@endif

<footer class="bg-dark text-white footer">

    <div
        class="container-fluid py-4 text-center"
        style="max-width:1800px;"
    >

        <h5>
            ArtiMorocco
        </h5>

        <p class="mb-1">
            Discover authentic Moroccan craftsmanship.
        </p>

        <small>
            © {{ date('Y') }} ArtiMorocco
        </small>

    </div>

</footer>


</body>
</html>
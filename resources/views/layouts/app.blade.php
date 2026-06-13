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
</head>



<body>

@include('partials.navbar')

<div
    class="container-fluid px-4 py-4 mx-auto"
    style="max-width: 1800px;"
>
    @yield('content')
</div>


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

<footer class="bg-dark text-white mt-5 py-4">

    <div class="container-fluid text-center">

        <p class="mb-1">
            ArtiMorocco
        </p>

        <small>
            Connecting Moroccan artisans with customers.
        </small>

    </div>

</footer>


</body>
</html>
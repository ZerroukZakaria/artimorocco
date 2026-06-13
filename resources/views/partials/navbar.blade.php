<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div
    class="container-fluid px-4 mx-auto"
    style="max-width:1800px;"
>        <a class="navbar-brand fw-bold" href="/">
            ArtiMorocco
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link" href="/">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->is('products*') ? 'active fw-bold' : '' }}"
                        href="/products"
                    >
                        Products
                    </a>
                </li>

            </ul>

            <ul class="navbar-nav">

                @guest

                    <li class="nav-item">
                        <a class="nav-link" href="/login">
                            Login
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/register">
                            Register
                        </a>
                    </li>

                @endguest

                @auth

                    <li class="nav-item">
<a
    class="nav-link {{ request()->is('dashboard*') ? 'active fw-bold' : '' }}"
    href="/dashboard/products"
>
    Dashboard
</a>
                        
                    </li>

@if(auth()->user()->role === 'admin')

<li class="nav-item dropdown">

    <a
        class="nav-link dropdown-toggle"
        href="#"
        role="button"
        data-bs-toggle="dropdown"
    >
        Admin
    </a>

    <ul class="dropdown-menu">

        <li>

            <a
                class="dropdown-item"
                href="/admin"
            >
                Dashboard
            </a>

        </li>

        <li>

            <a
                class="dropdown-item"
                href="/admin/users"
            >
                Users
            </a>

        </li>

        <li>

            <a
                class="dropdown-item"
                href="/admin/products"
            >
                Products
            </a>

        </li>

        <li>

            <a
                class="dropdown-item"
                href="/admin/categories"
            >
                Categories
            </a>

        </li>

    </ul>

</li>

@endif

                    <li class="nav-item">
                        <a class="nav-link " href="/dashboard/profile">
                            Profile
                        </a>
                    </li>

                    

                    <li class="nav-item">
                        <form action="/logout" method="POST">
                            @csrf

                            <button
                                type="submit"
                                class="btn btn-outline-light btn-sm ms-2"
                            >
                                Logout
                            </button>
                        </form>
                    </li>

                @endauth

            </ul>

        </div>

    </div>
</nav>
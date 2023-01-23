<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="https://res.cloudinary.com/dg3efqczq/image/upload/v1674465323/EpicShop/favicon_d1seiw.png" sizes="32x32">
    <title>Products</title>
</head>
<body>
    <nav class="d-flex align-items-center" style="height:5rem; padding:3rem">
    <a href="/">
        <img src="https://res.cloudinary.com/dg3efqczq/image/upload/v1674465241/EpicShop/plush_logo_opmp9f.jpg" alt="Logo Plush" style="height:2rem">
    </a>
        <ul class="nav ms-auto">
            <li class="nav-item">
                <a class="nav-link info font-monospace" style="color: deepskyblue !important" aria-current="page" href="/">Products</a>
            </li>
            @if(Auth::check())
                <li class="nav-item">
                    <a class="nav-link info font-monospace" style="color: deepskyblue !important" aria-current="page" href="/orders">orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-monospace" style="color: deepskyblue !important" aria-current="page" href="/logout">Logout</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link font-monospace" style="color: deepskyblue !important" aria-current="page" href="/cart">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-monospace" style="color: deepskyblue !important" href="/login">Admin</a>
                </li>
            @endif
        </ul>
    </nav>

    @if(Auth::check() && Request::path() === '/')
        <a href="/products/create" class="btn btn-primary ms-5">Add new product</a>
    @endif

    @if($flash = session('message'))
        @component('components/alert')
            @slot('type')
                success
            @endslot
            {{ $flash }}
        @endcomponent
    @endif

    <section class="m-5 d-flex flex-wrap">
        @yield('content')
    </section>
</body>
</html>
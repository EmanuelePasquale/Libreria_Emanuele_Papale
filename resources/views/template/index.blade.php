<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bookstore</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="\59_85246.svg" type="image/svg+xml">
</head>

<body>
    <x-navbar />
    <div class="bg-light py-5">
        <div class="container px-5 mt-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <div class="my-5 text-center text-xl-start">
                        <h1 class="display-5 fw-bolder mb-2">BOOKSTORE</h1>
                        <p class="lead fw-normal mb-4">Sfoglia le pagine e lasciati trasportare in mondi sconosciuti,
                            affonda le radici nei classici o abbraccia le novità. Qui, la tua prossima avventura
                            letteraria ti aspetta. Entra e lasciati ispirare dalla magia delle parole!</p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-dark btn-lg px-4 me-sm-3" href="#features">Chi siamo</a>
                            <a class="btn btn-outline-dark btn-lg px-4" href="#!">Contatti</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5"
                        src="\biblioteca1_large.jpg" alt="..."></div>
            </div>
        </div>
    </div>
    <main class="min-vh-100  pt-5">
        <div class="container">
            <div class="text-center py-5">
                <div class="container-fluid">
                    <div class="navbar justify-content-md-center" id="navbarsExample08">
                        <ul class="nav col-12 col-md-auto justify-content-center mb-md-0v align-items-center">
                            <li class="nav-item"><a
                                    class="@if (Route::currentRouteName() == 'books.index') btn btn-dark text-light disabled custom-bg-btn @endif mx-1"
                                    style="text-decoration: none; color: black;"
                                    href="{{ route('books.index') }}">Libri</a></li>
                            <li class="nav-item"><a
                                    class="@if (Route::currentRouteName() == 'authors.index') btn btn-dark text-light disabled custom-bg-btn @endif mx-1"
                                    href="{{ route('authors.index') }}"
                                    style="text-decoration: none; color: black;">Autori</a></li>
                            <li class="nav-item"><a
                                    class="@if (Route::currentRouteName() == 'categories.index') btn btn-dark text-light disabled custom-bg-btn @endif mx-1"
                                    style="text-decoration: none; color: black;"
                                    href="{{ route('categories.index') }}">Categorie</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <section class="py-5">
                <div class="container @if (Route::currentRouteName() != 'categories.index') px-5 @endif my-5">
                    <div class="row gx-5">

                        {{ $slot }}

                    </div>
                </div>
            </section>
        </div>
    </main>

    <x-footer />
</body>

</html>

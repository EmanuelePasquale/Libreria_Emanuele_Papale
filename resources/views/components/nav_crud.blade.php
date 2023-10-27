<nav class="container-fluid py-4">
    <div class="d-flex flex-wrap align-items-center justify-content-between py-1 mb-1 border-bottom">
        <div class="col-md-3 mb-md-0 text-start">
            <a href="{{ route('home') }}"
                class="d-inline-flex align-items-center link-body-emphasis text-decoration-none">
                <img class="bi rounded" src="\book.jpg" width="40" height="32" role="img">
                <span class="fs-4 fw-bold">Bookstore</span>
            </a>
        </div>
        @auth

            <form class=" col-md-3 text-end" action="{{ route('logout') }}" method="POST">
                @csrf
                @method('POST')
                <a href="{{ route('profile') }}" class="d-inline-flex link-body-emphasis text-decoration-none auth-link">
                    <span>
                        {{ Auth::user()->name }}
                    </span>
                </a>

                <a onclick="event.preventDefault(); this.closest('form').submit();" type="submit">
                    <i class="fa-solid fa-arrow-right-from-bracket nav-link-custom" style="color: black;"></i>
                </a>
            </form>
        @else
            <div class="col-md-3 text-end">
                <a type="submit" href="{{ route('login') }}" class="btn btn-sm btn-outline-dark me-2">Login</a>
                <a type="submit" href="{{ route('register') }}" class="btn btn-sm btn-dark">Registrati</a>
            </div>
        @endauth
    </div>
</nav>

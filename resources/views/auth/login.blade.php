<x-auth>
    <form class="card-body p-5 text-center" action="{{ route('login') }}" method="POST">
        @csrf
        @method('POST')
        <div class="d-flex justify-content-start">
            <a href="{{ route('home') }}">
                <i class="fa-solid fa-xmark fs-5" style="color: #ffffff;"></i>
            </a>
        </div>

        <div class="mb-md-5 mt-md-4 pb-5">
            <h2 class="fw-bold mb-2 text-uppercase d-flex justify-content-center align-items-center">
                <span style="width: 10%" class="mx-1">
                    <img src="/book.jpg" class="img-fluid rounded" alt="bookstore">
                </span>
                Bookstore
            </h2>

            <p class="text-white-50 mb-5">Inserisci la tua email e password!</p>

            <div class="form-outline form-white mb-4 text-start">
                <label class="form-label" for="typeEmailX">Email utente</label>
                <input type="email" id="typeEmailX" class="form-control form-control-lg"
                    placeholder="email@example.com" name="email" required />
                @error('email')
                    {{ $message }}
                @enderror
            </div>

            <div class="form-outline form-white mb-4 text-start">
                <label class="form-label" for="typePasswordX">Password</label>
                <input type="password" id="typePasswordX" class="form-control form-control-lg" placeholder="Password"
                    name="password" required />
                @error('password')
                    {{ $message }}
                @enderror
            </div>

            <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
        </div>

        <div>
            <p class="mb-0">Non hai un account? <a href="{{ route('register') }}"
                    class="text-white-50 fw-bold">Registrati</a>
            </p>
        </div>
    </form>
</x-auth>

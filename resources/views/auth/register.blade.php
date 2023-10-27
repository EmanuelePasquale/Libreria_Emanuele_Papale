<x-auth>
    <form class="card-body p-5 text-center" action="{{ route('register') }}" method="POST">
        @csrf
        @method('POST')
        <div class="d-flex justify-content-start">
            <a href="{{ route('home') }}">
                <i class="fa-solid fa-xmark fs-5" style="color: #ffffff;"></i>
            </a>
        </div>

        <div class="mb-md-4 mt-md-4 pb-1">
            <h2 class="fw-bold mb-2 text-uppercase d-flex justify-content-center align-items-center">
                <div class="w-25">
                    <img src="/book.jpg" class="img-fluid w-50 rounded" alt="bookstore">
                </div>
                Bookstore
            </h2>

            <p class="text-white-50 mb-5">Registrati ora!</p>

            <div class="form-outline form-white mb-4 text-start">
                <label class="form-label" for="name">Nome *</label>
                <input type="text" id="name"
                    class="form-control form-control-lg @error('name') is-invalid @enderror" placeholder="Nome"
                    name="name" required value="{{ old('name') }}" />
                @error('name')
                    {{ $message }}
                @enderror
            </div>

            <div class="form-outline form-white mb-4 text-start">
                <label class="form-label" for="surname">Cognome *</label>
                <input type="text" id="surname"
                    class="form-control form-control-lg @error('surname') is-invalid @enderror" placeholder="Cognome"
                    name="surname" required value="{{ old('surname') }}" />
                @error('surname')
                    {{ $message }}
                @enderror
            </div>

            <div class="form-outline form-white mb-4 text-start">
                <label class="form-label" for="typeEmailX">Indirizzo email *</label>
                <input type="email" id="typeEmailX"
                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                    placeholder="email@example.com" name="email" required value="{{ old('email') }}" />
                @error('email')
                    {{ $message }}
                @enderror
            </div>

            <div class="form-outline form-white mb-4 text-start">
                <label class="form-label" for="typePasswordX">Password *</label>
                <input type="password" id="typePasswordX"
                    class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Password"
                    name="password" required />
                @error('password')
                    {{ $message }}
                @enderror
            </div>

            <div class="form-outline form-white mb-4 text-start">
                <label for="password_confirmation" class="form-label">Conferma password *</label>
                <input type="password" name="password_confirmation"
                    class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror"
                    id="password_confirmation" required placeholder="Password">
            </div>

            <div class="text-start my-5">
                <p>* Campi obbligatori</p>
            </div>

            <button class="btn btn-outline-light btn px-5" type="submit">Registrati</button>
        </div>

        <div>
            <p class="mb-0">Hai già un account? <a href="{{ route('login') }}" class="text-white-50 fw-bold">Login</a>
            </p>
        </div>
    </form>
</x-auth>

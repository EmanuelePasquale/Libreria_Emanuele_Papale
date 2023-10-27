<x-crud>
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="row justify-content-center row-custom">
            <main>
                <form class="card-body text-center" action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="d-flex justify-content-start">
                        <a href="{{ route('home') }}">
                            <i class="fa-solid fa-xmark fs-5" style="color: #ffffff;"></i>
                        </a>
                    </div>

                    <div class="mb-md-4 mt-md-4 pb-1">
                        <h2 class="fw-bold mb-2 text-uppercase d-flex justify-content-center align-items-center">
                            Aggiungi una categoria
                        </h2>

                        <div class="form-outline form-white mb-4 text-start">
                            <label class="form-label" for="name">Nome categoria<span class="text-danger">*</span></label>
                            <input type="text" id="name"
                                class="form-control form-control-lg @error('name') is-invalid @enderror"
                                placeholder="Nome della categoria" name="name" required
                                value="{{ old('name') }}" />
                            @error('name')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="text-start text-danger my-5">
                            <p>* Campi obbligatori</p>
                        </div>

                        <button class="btn btn-outline-dark btn-lg px-5" href="" type="submit">Aggiungi</button>
                        <a class="btn btn-dark btn-lg px-5" href="{{ route('categories.dashboard') }}" type="submit">Annulla</a>
                    </div>
                </form>
            </main>
        </div>
    </div>
</x-crud>

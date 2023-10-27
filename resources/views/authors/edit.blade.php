<x-crud>
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="row justify-content-center row-custom">
            <main>
                <form class="card-body text-center" action="{{ route('authors.update', $author) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="d-flex justify-content-start">
                        <a href="{{ route('home') }}">
                            <i class="fa-solid fa-xmark fs-5" style="color: #ffffff;"></i>
                        </a>
                    </div>

                    <div class="mb-md-4 mt-md-4 pb-1">
                        <h2 class="fw-bold mb-2 text-uppercase d-flex justify-content-center align-items-center">
                            Modifica le informazioni dell' Autore
                        </h2>

                        <div class="form-outline form-white mb-4 text-start">
                            <label class="form-label" for="firstname">Nome <span class="text-danger">*</span></label>
                            <input type="text" id="firstname"
                                class="form-control form-control-lg @error('firstname') is-invalid @enderror"
                                placeholder="Nome dell'autore" name="firstname" required
                                value="{{ $author->firstname }}" />
                            @error('firstname')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="form-outline form-white mb-4 text-start">
                            <label class="form-label" for="lastname">Cognome <span class="text-danger">*</span></label>
                            <input type="text" id="lastname"
                                class="form-control form-control-lg @error('lastname') is-invalid @enderror"
                                placeholder="Cognome dell'autore" name="lastname" required
                                value="{{ $author->lastname }}" />
                            @error('lastname')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="form-outline form-white mb-4 text-start align-items-center">
                            <label class="form-label" for="nationality">Nazionalità</label>
                            <select type="text" id="nationality"
                                class="form-select form-select-lg @error('nationality') is-invalid @enderror"
                                placeholder="Autore" name="nationality" value="">
                                @foreach ($nationalities as $nationality)
                                    <option @if ($nationality == $author->nationality) selected @endif
                                        value="{{ $nationality }}" class="p-3">
                                        {{ $nationality }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="text-start text-danger my-5">
                            <p>* Campi obbligatori</p>
                        </div>

                        <button class="btn btn-outline-dark btn-lg px-5" href="" type="submit">Aggiungi</button>
                        <a class="btn btn-dark btn-lg px-5" href="{{ route('dashboard') }}" type="submit">Annulla</a>
                    </div>
                </form>
            </main>
        </div>
    </div>
</x-crud>

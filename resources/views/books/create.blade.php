<x-crud>
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="row justify-content-center row-custom">
            <main>
                <form class="card-body text-center pb-2" action="{{ route('books.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="d-flex justify-content-start">
                        <a href="{{ route('home') }}">
                            <i class="fa-solid fa-xmark fs-5" style="color: #ffffff;"></i>
                        </a>
                    </div>

                    <div class="mb-md-4 mt-md-4 pb-1">
                        <h2 class="fw-bold mb-2 text-uppercase d-flex justify-content-center align-items-center">
                            Metti in vendita
                        </h2>

                        <div class="form-outline form-white mb-4 text-start">
                            <label class="form-label" for="title">Titolo <span class="text-danger">*</span></label>
                            <input type="text" id="title"
                                class="form-control form-control-lg @error('title') is-invalid @enderror"
                                placeholder="Titolo del libro" name="title" required value="{{ old('title') }}" />
                            @error('title')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <div class="form-outline form-white mb-4 text-start align-items-center w-50 me-1">
                                <label class="form-label" for="author_id">Autore <span
                                        class="text-danger">*</span></label>
                                <select type="text" id="author_id"
                                    class="form-select form-select-lg @error('author_id') is-invalid @enderror"
                                    placeholder="Autore" name="author_id" required value="{{ old('author_id') }}">
                                    <option value="" class="p-3">
                                        -- Seleziona
                                    </option>
                                    @foreach ($authors as $author)
                                        <option value="{{ $author->id }}"
                                            {{ old('author_id') == $author->id ? 'selected' : '' }}>
                                            {{ $author->firstname }} {{ $author->lastname }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('author_id')
                                    {{ $message }}
                                @enderror

                                <a href="{{ route('authors.create') }}" class="btn btn-lg btn-outline-dark mt-4">
                                    <i class="px-2 fa fa-solid fa-circle-plus"></i>Autore
                                </a>

                                <a href="{{ route('categories.create') }}" class="btn btn-lg btn-outline-dark mt-4">
                                    <i class="px-2 fa fa-solid fa-circle-plus"></i>Categoria
                                </a>
                            </div>
                            <div class="d-flex flex-wrap">
                                @if ($categories->isEmpty())
                                    <div class="form-check form-white mb-4 text-start align-items-center ms-5">
                                        <label class="form-check-label" for="categories">Categoria
                                            sconosciuta</label>
                                        <input type="checkbox" id="categories"
                                            class="form-check-input form-check-input-lg @error('categories') is-invalid @enderror"
                                            placeholder="Categoria" name="categories[]" value="0" required>
                                    </div>
                                @endif
                                @foreach ($categories as $category)
                                    <div class="form-check form-white mb-4 text-start align-items-center ms-5">
                                        <label class="form-check-label" for="categories">{{ $category->name }}</label>
                                        <input type="checkbox" id="categories"
                                            class="form-check-input form-check-input-lg @error('categories') is-invalid @enderror"
                                            placeholder="Categoria" name="categories[]" value="{{ $category->id }}" required>
                                    </div>
                                    @error('categories[]')
                                        {{ $message }}
                                    @enderror
                                @endforeach

                            </div>


                        </div>



                        <div class="form-outline form-white mb-4 text-start">
                            <label class="form-label" for="image">Copertina</label>
                            <input type="file" id="image"
                                class="form-control form-control-lg @error('image') is-invalid @enderror" name="image"
                                value="{{ old('image') }}" />
                            @error('image')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="form-outline form-white mb-4 text-start">
                            <label class="form-label" for="genre">Stato del libro <span
                                    class="text-danger">*</span></label>
                            <input type="text" id="genre"
                                class="form-control form-control-lg @error('genre') is-invalid @enderror"
                                placeholder="Condizioni del libro" required name="genre"
                                value="{{ old('genre') }}" />
                            @error('genre')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="form-outline form-white mb-4 text-start">
                            <label for="password_confirmation" class="form-label">Numero di pagine</label>
                            <input type="number" name="pages"
                                class="form-control @error('pages') is-invalid @enderror" id="password_confirmation"
                                placeholder="0-9" value="{{ old('pages') }}" />
                            @error('pages')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="form-outline form-white mb-4 text-start">
                            <label class="form-label" for="description">Descrizione</label>
                            <input type="textarea" id="description"
                                class="form-control form-control-lg @error('description') is-invalid @enderror"
                                placeholder="Descrizione del libro" name="description"
                                value="{{ old('description') }}" />
                            @error('description')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="form-outline form-white mb-4 text-start">
                            <label class="form-label" for="typePasswordX">Anno di pubblicazione</label>
                            <input type="date" id="typePasswordX"
                                class="form-control form-control-lg @error('year') is-invalid @enderror"
                                name="year" value="{{ old('year') }}" />
                            @error('year')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="form-outline form-white mb-4 text-start">
                            <label for="password_confirmation" class="form-label">Prezzo <span
                                    class="text-danger">*</span></label>
                            <input type="number" name="price" min="1"
                                class="form-control form-control-lg @error('price') is-invalid @enderror"
                                id="password_confirmation" required placeholder="0-9€"
                                value="{{ old('year') }}" />
                            @error('price')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="text-start text-danger my-5">
                            <p>* Campi obbligatori</p>
                        </div>

                        <button class="btn btn-outline-dark btn-lg px-5" href=""
                            type="submit">Aggiungi</button>
                        <a class="btn btn-dark btn-lg px-5" href="{{ route('dashboard') }}"
                            type="submit">Annulla</a>
                    </div>
                </form>
            </main>
        </div>
    </div>
</x-crud>

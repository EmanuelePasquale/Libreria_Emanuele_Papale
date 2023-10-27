<x-layout>
    <main class="margin-show" style="margin-top: 20%">
        <section class="d-flex align-items-center">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"> <img class="card-img-top img-fluid rounded" style="width: 30rem; height: 35rem"
                            src="{{ empty($book->image) ? '\function_set_default_image_when_image_not_present.png' : Storage::url($book->image) }}"
                            alt="..." />
                    </div>
                    <div class="col-md-6 div-show-book py-4 d-flex flex-column justify-content-between">
                        <div>
                            <h1 class="display-5 fw-bolder">{{ $book->title }}</h1>
                            <hr>
                        </div>
                        <div class="fs-5">
                            <p class="lead">
                                Autore: <a class="text-dark"
                                    href="{{ route('authors.show', $book->author->id) }}"><strong>{{ $book->author->firstname }}
                                        {{ $book->author->lastname }}</strong></a>
                            </p>

                            <p class="lead">
                                Categoria: @foreach ($book->categories as $category)
                                    <a class="text-dark px-1"
                                        href="{{ route('categories.show', $category) }}"><strong>{{ $category->name }}</strong></a>
                                @endforeach
                            </p>


                            <p class="lead">
                                Condizioni: <strong>{{ $book->genre }}</strong>
                            </p>
                            <p class="lead">
                                Descrizione:
                                @if (!empty($book->description))
                                    <strong>{{ $book->description }}</strong>
                                @else
                                    Nessuna descrizione disponibile
                                @endif
                            </p>
                            <p class="lead">
                                Aggiunto il: <strong>{{ $book->created_at }}</strong>
                            </p>
                            <p class="lead">
                                Prezzo: <strong>{{ $book->price }}€</strong>
                            </p>
                        </div>
                        <div class="d-flex">
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Acquista
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4 pb-5">Potrebbero interessarti anche:</h2>
                <div
                    class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-start div-show-random">
                    @foreach ($books as $randombook)
                        @if ($randombook->id != $book->id)
                            <div class="col-lg-4 mb-5 trans-scale">
                                <div class="card h-100 shadow border-0">
                                    <img class="card-img-top card-img-show" style="height: 7rem"
                                        src="{{ empty($randombook->image) ? '\function_set_default_image_when_image_not_present.png' : Storage::url($randombook->image) }}"
                                        alt="{{ $randombook->title }}">
                                    <div class="card-body p-4">
                                        @if ($randombook->created_at->diffInHours(now()) < 24)
                                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                                        @endif

                                        <a class="text-decoration-none link-dark stretched-link"
                                            href="{{ route('books.show', $randombook) }}">
                                            <h5 class="card-title mb-3">{{ $randombook->title }}</h5>
                                        </a>
                                        <p class="card-text mb-0">{{ $randombook->description }}</p>
                                        <div class="d-flex align-items-center justify-content-between mt-3">
                                            <div class="small">
                                                <div class="fw-bold pb-2"><span class="fw-lighter">Atutore
                                                    </span>{{ $randombook->author->firstname }}
                                                    {{ $randombook->author->lastname }}</div>
                                                <div class="text-muted">Prezzo: {{ $randombook->price }}€</div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="d-none d-md-block card-footer p-4 pt-0 bg-transparent border-top-0">
                                        <div class="d-flex align-items-end justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <img class="rounded-circle me-3" style="width: 40px; height: 40px;"
                                                    src="{{ empty($randombook->user->image) ? '\function_set_default_image_when_image_not_present.png' : Storage::url($randombook->user->image) }}"
                                                    alt="{{ $randombook->user->name }}">
                                                <div class="small">
                                                    <div class="fw-bold">{{ $randombook->user->name }}</div>
                                                    <div class="text-muted">{{ $randombook->created_at }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    </main>
</x-layout>

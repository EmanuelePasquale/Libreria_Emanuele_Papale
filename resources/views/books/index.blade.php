<x-index>
    @foreach ($books as $book)
        <div class="col-lg-4 mb-5 trans-scale">
            <div class="card h-100 shadow border-0">
                <img class="card-img-top img-card-index"
                    src="{{ empty($book->image) ? '\function_set_default_image_when_image_not_present.png' : Storage::url($book->image) }}"
                    alt="{{ $book->title }}">
                <div class="card-body p-4">
                    @if ($book->created_at->diffInHours(now()) < 24)
                        <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                    @endif

                    <a class="text-decoration-none link-dark stretched-link" href="{{ route('books.show', $book) }}">
                        <h5 class="card-title mb-3">{{ $book->title }}</h5>
                    </a>
                    <p class="card-text mb-0">{{ $book->description }}</p>
                    <div class="d-flex align-items-center justify-content-between mt-3">
                        <div class="small">
                            <div class="fw-bold pb-2"><span class="fw-lighter">Autore
                                </span>{{ $book->author->firstname }} {{ $book->author->lastname }}</div>
                            <div class="text-muted">Prezzo: {{ $book->price }}€</div>
                        </div>
                    </div>

                </div>
                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                    <div class="d-flex align-items-end justify-content-between">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle me-3" style="width: 40px; height: 40px;"
                                src="{{ empty($book->user->image) ? '\function_set_default_image_when_image_not_present.png' : Storage::url($book->user->image) }}"
                                alt="{{ $book->user->name }}">
                            <div class="small">
                                <div class="fw-bold">{{ $book->user->name }}</div>
                                <div class="text-muted">{{ $book->created_at }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-index>

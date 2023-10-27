<x-layout>
    <div class="bg-light py-5 mt-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-dark">
                <h1 class="fw-bolder">Sfoglia i libri per autore</h1>
                <p class="lead fw-normal text-dark-50 mb-0">Qui trovi tutti i libri per autore</p>
            </div>
        </div>
    </div>
    <section class="py-5 min-vh-100">
        <div class="container px-4 px-lg-5 mt-5">
            <h3 class="mb-5 pb-5">In base all'autore: <span class="link-underline-dark">{{ $author->firstname }}
                    {{ $author->lastname }}</span></h3>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-start div-show-random">
                @foreach ($books as $randombook)
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
                @endforeach
            </div>
        </div>
    </section>
</x-layout>

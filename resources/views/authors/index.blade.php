<x-index>
    <div class="container">
        <div class="row">
            <div class="align-middle gap-2 py-4">
                <h3>Ricerca per autore</h3>
            </div>
            <div class="col-md-12">
                <div class="row">
                    @foreach ($authors as $author)
                        <div class="col-lg-3">
                            <div class="card mb-4">

                                <div class="card-body">

                                    <h2 class="card-title h4">{{ $author->firstname }} {{ $author->lastname }} </h2>


                                    <div class="small text-muted mb-3">Nazionalità:
                                        <span
                                            class="link-underline-dark">{{ isset($author->nationality) ? $author->nationality : '' }}</span>
                                    </div>


                                    <a href="{{ route('authors.show', $author) }}"><button type="submit"
                                            class="btn btn-outline-dark mx-1">Vedi dettagli →</button></a>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


</x-index>

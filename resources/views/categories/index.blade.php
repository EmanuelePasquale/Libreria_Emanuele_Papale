<x-index>
    <div class="container">
        <div class="align-middle gap-2 py-2">
            <h3>Ricerca per categoria</h3>
        </div>
        <table class="table border mt-2">
            <thead>
                <tr>
                <th scope="col" class="align-middle">#</th>
                    <th scope="col" class="align-middle">Categoria</th>
                    <th scope="col" class="align-middle"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                <tr>
                    <th scope="row" class="align-middle">{{ $count++ }}</th>
                    <td class="align-middle">{{$category->name}}</td>
                    <td class="align-middle">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{route('categories.show', $category)}}" class="btn btn-outline-dark me-md-2">Vedi dettagli →</a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr colspan="4" class="align-middle">/ </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-index>
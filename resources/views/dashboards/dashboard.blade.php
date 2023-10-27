<x-dashboard>

    <div class="d-flex justify-content-between py-5">
        <h2 class="text-dark ">Dashboard</h2>
        <button class="btn btn-success" type="button"><a class="text-decoration-none text-light"
                href="{{ route('books.create') }}">Aggiungi un libro</a></button>
    </div>
    @if (session('success') != 'Libro eliminato con successo' && session('success'))
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg>
            <div>
                {{ session('success') }}
            </div>
        </div>
    @endif
    @if (session('success') == 'Libro eliminato con successo')
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg>
            <div>
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col-md-1" class="py-3">#</th>
                    <th scope="col-md-1" class="py-3">Titolo</th>
                    <th scope="col-md-1" class="py-3">Autore</th>
                    <th scope="col-md-1" class="py-3">Categoria</th>
                    <th scope="col-md-1" class="py-3 d-none d-md-table-cell">Genere</th>
                    <th scope="col-md-1" class="py-3 d-none d-md-table-cell">Descrizione</th>
                    <th scope="col-md-1" class="py-3 d-none d-md-table-cell">Anno di pubblicazione</th>
                    <th scope="col-md-1" class="py-3 d-none d-md-table-cell">N. di pagine</th>
                    <th scope="col-md-1" class="py-3 d-none d-md-table-cell">Prezzo</th>
                    <th scope="col-md-1" class="py-3"></th>
                    <th scope="col-md-1" class="py-3"></th>
                </tr>
            </thead>

            <tbody>
                @foreach (Auth::user()->books as $book)
                    <tr>
                        <td class="py-3 col-md-1 align-middle">{{ $count++ }}</td>
                        <td class="py-3 col-md-1 align-middle">
                            <a href="{{ route('books.show', compact('book')) }}"
                                class="nav-link-custom text-decoration-none d-flex align-items-center gap-2 text-dark">
                                {{ $book->title }} <span><i class="fa-solid fa-magnifying-glass"></i></span>
                            </a>
                        </td>

                        <td class="py-3 col-md-1 align-middle">
                            <a href="{{ route('authors.edit', ['author' => $book->author->id]) }}"
                                class="nav-link-custom text-decoration-none d-flex align-items-center gap-2 text-dark">{{ $book->author->firstname }}
                                {{ $book->author->lastname }} <span><i class="fa-solid fa-pen-to-square"></i></span>
                            </a>
                        </td>
                        <td class="py-3 col-md-1 align-middle">
                            @foreach (Auth::user()->categories as $category)
                                <a href="{{ route('categories.edit', ['category' => $category->id]) }}"
                                    class="nav-link-custom text-decoration-none d-flex align-items-center gap-2 text-dark">
                                    {{ $category->name }} <span><i class="fa-solid fa-pen-to-square"></i></span>
                                </a>
                            @endforeach
                        </td>
                        <td class="py-3 col-md-1 align-middle d-none d-md-table-cell">{{ $book->genre }}
                            @if (!$book->genre)
                                /
                            @endif
                        </td>
                        <td class="py-3 col-md-1 align-middle d-none d-md-table-cell">{{ $book->description }}
                            @if (!$book->description)
                                /
                            @endif
                        </td>
                        <td class="py-3 col-md-1 align-middle d-none d-md-table-cell">{{ $book->year }}
                            @if (!$book->year)
                                /
                            @endif
                        </td>
                        <td class="py-3 col-md-1 align-middle d-none d-md-table-cell">{{ $book->pages }}
                            @if (!$book->pages)
                                /
                            @endif
                        </td>
                        <td class="py-3 col-md-1 align-middle d-none d-md-table-cell">{{ $book->price }}€</td>
                        <td class="text-center align-middle">
                            <a href="{{ route('books.edit', compact('book')) }}" class="btn btn-sm btn-warning"><i
                                    class="fa-solid fa-pen-to-square icon-edit"></i>
                                <span class="d-none btn-edit">Modifica</span>
                            </a>
                        </td>
                        <td class="text-center align-middle">
                            <form class="dropdown col-md-3 text-center align-middle"
                                action="{{ route('books.destroy', compact('book')) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger d-none d-md-block" type="submit">
                                    Elimina
                                </button>
                                <button class="btn btn-sm btn-danger d-block d-md-none" type="submit">
                                    <i class="fa-solid fa-trash-can" style="color: #ffffff;"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-dashboard>

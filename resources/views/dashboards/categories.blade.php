<x-dashboard>
    <div class="d-flex justify-content-between py-5">
        <h2 class="text-dark ">Dashboard</h2>
        <button class="btn btn-success" type="button"><a class="text-decoration-none text-light"
                href="{{ route('categories.create') }}">Aggiungi una categoria</a></button>
    </div>
    @if (session('success') != 'Categoria eliminata con successo' && session('success'))
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg>
            <div>
                {{ session('success') }}
            </div>
        </div>
    @endif
    @if (session('success') == 'Categoria eliminata con successo')
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
                    <th scope="col-md-1" class="py-3">Categoria</th>
                    <th scope="col-md-1" class="py-3"></th>
                    <th scope="col-md-1" class="py-3"></th>
                </tr>
            </thead>

            <tbody>
                @foreach (Auth::user()->categories as $category)
                    <tr>
                        <td class="py-3 col-md-1">{{ $count++ }}</td>
                        <td class="py-3 col-md-1">
                            <a href="{{ route('categories.show', compact('category')) }}"
                                class="nav-link-custom text-decoration-none d-flex align-items-center text-dark">{{ $category->name }}<span class="px-1"><i class="fa-solid fa-magnifying-glass"></i></span>
                            </a>
                        </td>

                        <td class="text-center align-middle">
                            <a href="{{ route('categories.edit', compact('category')) }}"
                                class="btn btn-sm btn-warning"><i class="fa-solid fa-pen-to-square icon-edit"></i>
                                <span class="d-none btn-edit">Modifica</span>
                            </a>
                            
                        </td>

                        <td class="text-center align-middle">
                            <form class="dropdown col-md-3 text-center align-middle"
                                action="{{ route('categories.destroy', compact('category')) }}" method="POST">
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

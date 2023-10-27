<x-dashboard>
    @if (session('success'))
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg>
            <div>
                {{ session('success') }}
            </div>
        </div>
    @endif
    <section class="height-profile" style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="{{ Storage::url(Auth::user()->image) }}" alt="avatar"
                                class="rounded-circle img-thumbnail border-primary img-fluid"
                                style="width: 10rem; height: 10rem">
                            <h5 class="my-3">{{ Auth::user()->name }} {{ Auth::user()->surname }}</h5>
                            <p class="text-muted mb-1">{{ Auth::user()->description }} @if (empty(Auth::user()->description))
                                    INFORMAZIONI
                                @endif
                            </p>
                            <p class="text-muted mb-4">Registrato il: {{ Auth::user()->created_at }}</p>
                            <div class="d-flex justify-content-center mb-2">
                                <a href="{{ route('user.edit') }}" class="btn btn-dark text-decoration-none">MODIFICA
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ Auth::user()->name }} {{ Auth::user()->surname }}
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Phone</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ Auth::user()->phone }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Address</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        @if (!empty(Auth::user()->address))
                                            {{ Auth::user()->address }}, {{ Auth::user()->city }}
                                            ({{ Auth::user()->country }}) - {{ Auth::user()->state }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush rounded-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                    <p class="mb-0">
                                        @if (empty(Auth::user()->github))
                                            http:://
                                        @else
                                            <a href="{{ Auth::user()->github }}" target="_blank"
                                                class="text-decoration-none">{{ Auth::user()->github }}</a>
                                        @endif
                                    </p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-discord fa-lg" style="color: #7289DA;">
                                    </i>
                                    <p class="mb-0">
                                        @if (empty(Auth::user()->discord))
                                            Nome utente
                                        @else
                                            {{ Auth::user()->discord }}
                                        @endif
                                    </p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                    <p class="mb-0">
                                        @if (empty(Auth::user()->instagram))
                                            http:://
                                        @else
                                            <a href="{{ Auth::user()->instagram }}">{{ Auth::user()->instagram }}</a>
                                        @endif
                                    </p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                    <p class="mb-0">
                                        @if (empty(Auth::user()->facebook))
                                            http:://
                                        @else
                                            <a href="{{ Auth::user()->facebook }}" target="_blank"
                                                class="text-decoration-none">{{ Auth::user()->facebook }}</a>
                                        @endif
                                    </p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-linkedin-in fa-lg" style="color: #3b5998;"></i>
                                    <p class="mb-0">
                                        @if (empty(Auth::user()->linkedin))
                                            http:://
                                        @else
                                            <a class="text-decoration-none" target="_blank"
                                                href="{{ Auth::user()->linkedin }}">{{ Auth::user()->linkedin }}</a>
                                        @endif
                                    </p>
                                </li>
                                <li class="list-group-item d-flex justify-content-end align-items-center p-3">
                                    <a href="{{ route('social.edit') }}"
                                        class="btn btn-dark text-decoration-none">MODIFICA</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-dashboard>

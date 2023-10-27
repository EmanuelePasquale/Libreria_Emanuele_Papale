<x-crud>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="row justify-content-center row-custom">
            <main>
                <form class="card-body text-center pb-3" action="{{ route('social.update', $user) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-md-4 mt-md-4 pb-1">
                        <h2
                            class="fw-bold mb-2 pb-4 text-uppercase d-flex justify-content-center align-items-center py-5">
                            Modifica informazioni utente
                        </h2>

                        <div class="card mb-4 mb-lg-0">
                            <div class="card-body p-0">
                                <ul class="list-group list-group-flush rounded-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                        <input type="text" id="github" placeholder="https://github.com/"
                                            class="w-50 form-control form-control-lg @error('github') is-invalid @enderror"
                                            name="github" value="{{ $user->github }}" />
                                        @error('github')
                                            {{ $message }}
                                        @enderror
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-discord fa-lg" style="color: #7289DA;">
                                        </i>
                                        <input type="text" id="discord" placeholder="https://discord.gg/"
                                            class="w-50 form-control form-control-lg @error('discord') is-invalid @enderror"
                                            name="discord" value="{{ $user->discord }}" />
                                        @error('discord')
                                            {{ $message }}
                                        @enderror
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                        <input type="text" id="instagram" placeholder="https://instagram.com/"
                                            class="w-50 form-control form-control-lg @error('instagram') is-invalid @enderror"
                                            name="instagram" value="{{ $user->instagram }}" />
                                        @error('instagram')
                                            {{ $message }}
                                        @enderror
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                        <input type="text" id="facebook" placeholder="https://facebook.com/"
                                            class="w-50 form-control form-control-lg @error('facebook') is-invalid @enderror"
                                            name="facebook" value="{{ $user->facebook }}" />
                                        @error('facebook')
                                            {{ $message }}
                                        @enderror
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-linkedin-in fa-lg" style="color: #3b5998;"></i>
                                        <input type="text" id="linkedin" placeholder="https://linkedin.com/"
                                            class="w-50 form-control form-control-lg @error('linkedin') is-invalid @enderror"
                                            name="linkedin" value="{{ $user->linkedin }}" />
                                        @error('linkedin')
                                            {{ $message }}
                                        @enderror
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="text-start text-danger my-5">
                            <p>* Campi obbligatori</p>
                        </div>

                        <button class="btn btn-outline-dark btn-lg px-5" href="" type="submit">Aggiorna</button>
                        <a class="btn btn-dark btn-lg px-5" href="{{ route('profile') }}">Annulla</a>
                    </div>
                </form>
            </main>
        </div>
    </div>
</x-crud>

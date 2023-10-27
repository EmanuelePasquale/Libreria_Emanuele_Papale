<section style="background-color: #F5DEB3;">
    <div class="container py-5">
        <div class="row pt-5 justify-content-center">
            <h2 class="fw-bold mb-2 d-flex justify-content-center align-items-center">
                Naviga nel nostro store:
            </h2>
        </div>
        <div class="row py-5 justify-content-center">
            <div class="card card-custom col-md-3 ml-auto m-2 text-light"
                style="background-image: url('/029968-620-amazon-goodread-libri-ia.jpg');">
                <div class="card-body" style="">
                    <h5 class="card-title" style="margin-top: 85%">Libri</h5>
                    <p class="card-text">Sfoglia i nostri libri</p>
                    <a href="{{ route('books.index') }}" class="btn btn-primary text-dark border-custom">Acquista
                        ora</a>
                </div>
            </div>
            <div class="card card-custom col-md-3 ml-auto m-2 text-light"
                style="background-image: url('/images.jpeg');">
                <div class="card-body" style="">
                    <h5 class="card-title" style="margin-top: 85%">Autori</h5>
                    <p class="card-text">Scopri gli autori</p>
                    <a href="{{ route('authors.index') }}" class="btn btn-primary text-dark border-custom">Acquista
                        ora</a>
                </div>
            </div>
            <div class="card card-custom col-md-3 ml-auto m-2 text-light"
                style="background-image: url('/82428247-concetto-di-istruzione-vecchi-libri-su-sfondo-lavagna.jpg');">
                <div class="card-body" style="">
                    <h5 class="card-title" style="margin-top: 85%">Categorie</h5>
                    <p class="card-text">Seleziona la categoria</p>
                <a href="{{ route('categories.index') }}" class="btn btn-primary text-dark border-custom">Acquista ora</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section style="background-color: rgba(195, 193, 180, 255);">

    <div class="container-fluid col-xxl-8 min-vh-100 d-flex justify-content-center align-items-center">
        <div class="row flex-lg-row-reverse align-items-center gx-5 bg-img">
            <div class="col-lg-7 text-justify d-block">
                <h2 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Vuoi vendere un libro?</h2>
                <p class="lead fw-bold">Registrati ora e inizia a vendere online i tuoi libri.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a type="submit" href="{{ route('login') }}" class="btn btn-lg btn-outline-dark me-2">Login</a>
                    <a type="submit" href="{{ route('register') }}" class="btn btn-lg btn-dark">Registrati</a>
                </div>
            </div>
            <div class="col-lg-6 bg-transparent">

            </div>
        </div>
    </div>
</section>

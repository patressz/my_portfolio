@include('partials.header')

    <!-- Background image -->
    <div class="bg-img">

        <!-- Container -->
        <div class="container">

            <!-- Main navigation -->
            <nav id="main-navigation" class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <a class="navbar-brand logo" href="#"><img src="assets/images/logo.jpg" alt=""></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#" >Úvod</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#main-content">O mne</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#my-work">Moje projekty</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contact-form">Kontakt</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End main navigation -->

            <!-- Main header -->
            <header id="main-header" class="d-flex align-items-center justify-content-center text-center">
                <div class="row">
                    <div class="col-md-12">
                        <h1 id="display-name" class="display-2 text-light">Patrik Strišovský</h1>
                        <h3 class="display-4">Web developer</h3>
                    </div>
                </div>
            </header>
            <!-- End main header -->

        </div>
        <!-- End container -->

        <!-- Main content -->
        <main id="main-content" class="mt-5">
            <div class="container">
                <div class="row text-dark">

                        <header class="my-5">
                            <h1 class="text-center">O mne</h1>
                        </header>

                        <div class="col-md-6">
                            <article>
                                <header class="mb-3">
                                    <h3>Kto som?</h3>
                                </header>
                                <p>
                                    Volám sa Patrik a medzi moje obľubené činnosti patrí tvorba webov a programovanie. Rád študujem a učím sa
                                    nové veci zo sveta IT.
                                </p>

                                <p>
                                    K tvorbe webov som sa dostal v roku 2014, keď som potreboval vytvoriť stránku pre kamaráta.
                                    Neskôr, keď som zistil, že ma to baví a napĺňa, tak som sa tomu začal viac venovať a zameral som sa
                                    najmä na back-end.
                                </p>

                                <h4 class="mb-3">Kurzy</h4>
                                <p>
                                    Absolvoval som online kurzy na portáli <strong><a href="https://www.learn2code.sk/" target="_blank">learn2code</a></strong>, kde som získal základy.
                                </p>

                                <ul>
                                    <li>Web Rebel: Základy tvorby webových stránok</li>
                                    <li>Základy programovania a OOP</li>
                                    <li>Web Rebel PHP: Tvorba dynamických webov</li>
                                    <li>Web Rebel Laravel: Tvorba dynamických webov 2</li>
                                    <li>SQL databázy: MySQL a SQLite</li>
                                    <li>PHP framework LUMEN</li>
                                </ul>
                            </article>
                        </div>

                        <div class="col-md-6">
                            <article>
                                <header class="mb-3">
                                    <h3>Čo ovládam</h3>
                                </header>
                                <p>
                                    Momentálne ovládam nižšie uvedené značkovacie a programovacie jazyky a v aktuálnom čase sa venujem najmä frameworku LARAVEL.
                                </p>

                                <h4 class="mb-3">Technológie</h4>
                                <ul>
                                    <li>HTML5</li>
                                    <li>PHP</li>
                                    <li>CSS3</li>
                                    <li>JS & jQuery</li>
                                    <li>MySQL</li>
                                </ul>
                            </article>
                        </div>

                </div>
            </div>
        </main>
        <!-- End main content -->

        <!-- My work -->
        <div id="my-work">
            <div class="container">
                <div class="row">

                    <header class="my-5">
                        <h1 class="text-center">Moje projekty</h1>
                    </header>

                    @foreach ($projects as $project)
                        <div class="col-md-6 my-3">
                            <div class="js-tilt card mb-3 shadow-lg">
                                @if ( empty($project->url) )

                                    <a href="{{ url('storage/image/' . $project->image ) }}" data-lightbox="gallery" data-title="{{ $project->title }}">
                                        <img src="{{ url('storage/thumbnail/' . $project->image ) }}" class="cover card-img-top" alt="...">
                                    </a>

                                @else

                                    <a target="_blank" href="{{ $project->url }}">
                                        <img src="{{ url('storage/thumbnail/' . $project->image ) }}" class="cover card-img-top" alt="...">
                                    </a>

                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $project->title }}</h5>
                                    <p class="card-text">{{ $project->content }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- End my work -->

@include('partials.contact')
@include('partials.footer')

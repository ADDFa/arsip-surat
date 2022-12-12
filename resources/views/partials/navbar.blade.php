<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/beranda">
            <img src="/img/logo.png" alt="Logo" class="logo">
            <h3 class="fw-bold d-inline">SMAN 8 Kota Bengkulu</h3>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse justify-content-end navbar-collapse" id="navbarSupportedContent">
            <div class="dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Selamat Datang, {{ session('user')->name }}
                </a>
                <ul class="dropdown-menu">
                    <li><a class=" dropdown-item"
                            href="/pengguna/{{ session('user')->username }}/edit-profil">Profil</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="/keluar">Keluar</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
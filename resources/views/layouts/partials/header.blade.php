<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Deneme E-Ticaret') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Sol Menü -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Ana Sayfa</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Kategoriler
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            {{-- Kategoriler veritabanından gelecek --}}
                            <li><a class="dropdown-item" href="{{ url('/products') }}">Tüm Kategoriler</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('products') ? 'active' : '' }}" href="{{ url('/products') }}">Tüm Ürünler</a>
                    </li>
                </ul>

                <!-- Arama Formu -->
                <form class="d-flex mx-auto" action="{{ url('/search') }}" method="GET">
                    <div class="input-group">
                        <input class="form-control" type="search" name="q" placeholder="Ürün ara..." aria-label="Search" value="{{ request('q') }}">
                        <button class="btn btn-outline-primary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>

                <!-- Sağ Menü -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link position-relative" href="{{ url('/cart') }}">
                            <i class="bi bi-cart"></i> Sepet
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ session()->has('cart') ? count(session('cart')) : 0 }}
                            </span>
                        </a>
                    </li>

                    {{-- Kimlik doğrulama sistemi henüz kurulmadı --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-person"></i> Hesabım</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

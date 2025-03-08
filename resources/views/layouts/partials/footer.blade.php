<footer class="mt-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-3 mb-4 mb-md-0">
                <h5 class="mb-4">{{ config('app.name', 'Deneme E-Ticaret') }}</h5>
                <p class="text-muted">
                    Modern, profesyonel ve kullanıcı dostu e-ticaret deneyimi için buradayız.
                </p>
                <div class="d-flex mt-4">
                    <a href="#" class="me-3 text-white">
                        <i class="bi bi-facebook fs-5"></i>
                    </a>
                    <a href="#" class="me-3 text-white">
                        <i class="bi bi-twitter fs-5"></i>
                    </a>
                    <a href="#" class="me-3 text-white">
                        <i class="bi bi-instagram fs-5"></i>
                    </a>
                    <a href="#" class="text-white">
                        <i class="bi bi-youtube fs-5"></i>
                    </a>
                </div>
            </div>

            <div class="col-md-3 mb-4 mb-md-0">
                <h5 class="mb-4">Hızlı Erişim</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="{{ url('/') }}" class="text-decoration-none text-white-50">Ana Sayfa</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ url('/products') }}" class="text-decoration-none text-white-50">Ürünler</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ url('/about') }}" class="text-decoration-none text-white-50">Hakkımızda</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ url('/contact') }}" class="text-decoration-none text-white-50">İletişim</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-3 mb-4 mb-md-0">
                <h5 class="mb-4">Müşteri Hizmetleri</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="{{ url('/faq') }}" class="text-decoration-none text-white-50">Sıkça Sorulan Sorular</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ url('/shipping') }}" class="text-decoration-none text-white-50">Kargo ve Teslimat</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ url('/returns') }}" class="text-decoration-none text-white-50">İade ve Değişim</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ url('/privacy') }}" class="text-decoration-none text-white-50">Gizlilik Politikası</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-3">
                <h5 class="mb-4">İletişim</h5>
                <ul class="list-unstyled">
                    <li class="mb-2 text-white-50">
                        <i class="bi bi-geo-alt me-2"></i> İstanbul, Türkiye
                    </li>
                    <li class="mb-2 text-white-50">
                        <i class="bi bi-telephone me-2"></i> +90 (212) 123 45 67
                    </li>
                    <li class="mb-2 text-white-50">
                        <i class="bi bi-envelope me-2"></i> info@denemeeticaret.com
                    </li>
                </ul>

                <h5 class="mb-3 mt-4">Bültenimize Abone Olun</h5>
                <form action="{{ url('/subscribe') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="E-posta adresiniz" required>
                        <button class="btn btn-primary" type="submit">Abone Ol</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="bg-dark py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0 text-white-50">
                        &copy; {{ date('Y') }} {{ config('app.name', 'Deneme E-Ticaret') }}. Tüm hakları saklıdır.
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <img src="{{ asset('images/payment-methods.png') }}" alt="Ödeme Yöntemleri" height="30">
                </div>
            </div>
        </div>
    </div>
</footer>

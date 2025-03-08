@extends('layouts.app')

@section('title', 'Ana Sayfa')

@section('content')
    <!-- Hero Banner -->
    <div class="container-fluid p-0">
        <div class="bg-primary text-white text-center py-5">
            <div class="container py-5">
                <h1 class="display-4 fw-bold">Deneme E-Ticaret</h1>
                <p class="lead">Modern, profesyonel ve kullanıcı dostu e-ticaret deneyimi</p>
                <a href="{{ url('/products') }}" class="btn btn-light btn-lg">Alışverişe Başla</a>
            </div>
        </div>
    </div>

    <!-- Kategoriler -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Kategoriler</h2>
            <div class="row">
                @for($i = 1; $i <= 6; $i++)
                    <div class="col-md-4 col-lg-2 mb-4">
                        <a href="{{ url('/products') }}" class="text-decoration-none">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="bg-light p-4 text-center">
                                    <i class="bi bi-grid fs-1"></i>
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title">Kategori {{ $i }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- Öne Çıkan Ürünler -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Öne Çıkan Ürünler</h2>
            <div class="row">
                @for($i = 1; $i <= 4; $i++)
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="card h-100 product-card">
                            <div class="discount-badge">%20</div>

                            <a href="{{ url('/products') }}">
                                <div class="bg-light p-4 text-center">
                                    <i class="bi bi-image fs-1"></i>
                                </div>
                            </a>

                            <div class="card-body">
                                <h5 class="product-title">
                                    <a href="{{ url('/products') }}" class="text-decoration-none text-dark">
                                        Örnek Ürün {{ $i }}
                                    </a>
                                </h5>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="product-sale-price">799,90 TL</span>
                                        <span class="product-original-price ms-2">999,90 TL</span>
                                    </div>

                                    <a href="{{ url('/cart') }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-cart-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

            <div class="text-center mt-4">
                <a href="{{ url('/products') }}" class="btn btn-primary">Tüm Ürünleri Gör</a>
            </div>
        </div>
    </section>

    <!-- Yeni Ürünler -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Yeni Ürünler</h2>
            <div class="row">
                @for($i = 1; $i <= 4; $i++)
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="card h-100 product-card">
                            <a href="{{ url('/products') }}">
                                <div class="bg-light p-4 text-center">
                                    <i class="bi bi-image fs-1"></i>
                                </div>
                            </a>

                            <div class="card-body">
                                <h5 class="product-title">
                                    <a href="{{ url('/products') }}" class="text-decoration-none text-dark">
                                        Yeni Ürün {{ $i }}
                                    </a>
                                </h5>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="product-price">599,90 TL</span>
                                    </div>

                                    <a href="{{ url('/cart') }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-cart-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- Özellikler -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 mb-4 mb-md-0">
                    <div class="p-4">
                        <i class="bi bi-truck fs-1 text-primary mb-3"></i>
                        <h4>Hızlı Teslimat</h4>
                        <p class="text-muted">Siparişleriniz en hızlı şekilde kapınızda.</p>
                    </div>
                </div>

                <div class="col-md-3 mb-4 mb-md-0">
                    <div class="p-4">
                        <i class="bi bi-shield-check fs-1 text-primary mb-3"></i>
                        <h4>Güvenli Ödeme</h4>
                        <p class="text-muted">Tüm ödemeleriniz güvenle gerçekleşir.</p>
                    </div>
                </div>

                <div class="col-md-3 mb-4 mb-md-0">
                    <div class="p-4">
                        <i class="bi bi-arrow-repeat fs-1 text-primary mb-3"></i>
                        <h4>Kolay İade</h4>
                        <p class="text-muted">14 gün içinde kolay iade imkanı.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="p-4">
                        <i class="bi bi-headset fs-1 text-primary mb-3"></i>
                        <h4>7/24 Destek</h4>
                        <p class="text-muted">Müşteri hizmetlerimiz her zaman yanınızda.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

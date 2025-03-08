@extends('layouts.app')

@section('title', 'Tüm Ürünler')

@section('content')
<div class="container py-4">
    <div class="row">
        <!-- Yan Menü -->
        <div class="col-lg-3 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Kategoriler</h5>
                </div>
                <div class="card-body category-sidebar">
                    <div class="category-item">
                        <a href="{{ url('/products') }}" class="d-flex justify-content-between align-items-center fw-bold text-primary">
                            Tüm Ürünler
                        </a>
                    </div>
                    @for($i = 1; $i <= 5; $i++)
                        <div class="category-item">
                            <a href="{{ url('/products') }}" class="d-flex justify-content-between align-items-center">
                                Kategori {{ $i }}
                            </a>
                        </div>
                    @endfor
                </div>
            </div>

            <div class="card border-0 shadow-sm mt-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Filtrele</h5>
                </div>
                <div class="card-body">
                    <form action="{{ url('/products') }}" method="GET">
                        <div class="mb-3">
                            <label for="min_price" class="form-label">Min. Fiyat</label>
                            <input type="number" class="form-control" id="min_price" name="min_price" value="{{ request('min_price') }}">
                        </div>
                        <div class="mb-3">
                            <label for="max_price" class="form-label">Max. Fiyat</label>
                            <input type="number" class="form-control" id="max_price" name="max_price" value="{{ request('max_price') }}">
                        </div>
                        <div class="mb-3">
                            <label for="sort" class="form-label">Sırala</label>
                            <select class="form-select" id="sort" name="sort">
                                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>En Yeniler</option>
                                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Fiyat (Düşükten Yükseğe)</option>
                                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Fiyat (Yüksekten Düşüğe)</option>
                                <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>İsim (A-Z)</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Filtrele</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Ürün Listesi -->
        <div class="col-lg-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3">Tüm Ürünler</h1>
                <div>
                    <span class="text-muted">8 ürün bulundu</span>
                </div>
            </div>

            <div class="row">
                @for($i = 1; $i <= 8; $i++)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 product-card">
                            @if($i % 3 == 0)
                                <div class="discount-badge">%20</div>
                            @endif

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
                                        @if($i % 3 == 0)
                                            <span class="product-sale-price">799,90 TL</span>
                                            <span class="product-original-price ms-2">999,90 TL</span>
                                        @else
                                            <span class="product-price">{{ 500 + ($i * 50) }},00 TL</span>
                                        @endif
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

            <div class="d-flex justify-content-center mt-4">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection

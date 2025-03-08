@extends('layouts.app')

@section('title', $category->name)

@section('content')
<div class="container py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Ana Sayfa</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
        </ol>
    </nav>

    <div class="row">
        <!-- Yan Menü -->
        <div class="col-lg-3 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Kategoriler</h5>
                </div>
                <div class="card-body category-sidebar">
                    <div class="category-item">
                        <a href="{{ url('/products') }}" class="d-flex justify-content-between align-items-center">
                            Tüm Ürünler
                        </a>
                    </div>

                    @for($i = 1; $i <= 5; $i++)
                        <div class="category-item">
                            <a href="{{ url('/category/kategori-' . $i) }}" class="d-flex justify-content-between align-items-center {{ $i == $category->id ? 'fw-bold text-primary' : '' }}">
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
                    <form action="{{ url('/category/' . $category->slug) }}" method="GET">
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
                <div>
                    <h1 class="h3">{{ $category->name }}</h1>
                    @if($category->description)
                        <p class="text-muted">{{ $category->description }}</p>
                    @endif
                </div>
                <div>
                    <span class="text-muted">0 ürün bulundu</span>
                </div>
            </div>

            <div class="alert alert-info">
                Bu kategoride henüz ürün bulunmamaktadır.
            </div>
        </div>
    </div>
</div>
@endsection

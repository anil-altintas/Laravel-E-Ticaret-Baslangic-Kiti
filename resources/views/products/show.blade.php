@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Ana Sayfa</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/products') }}">Ürünler</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
        </ol>
    </nav>

    <div class="row product-detail">
        <!-- Ürün Resimleri -->
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm">
                <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="bg-light p-5 text-center">
                                <i class="bi bi-image fs-1"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ürün Bilgileri -->
        <div class="col-md-6">
            <h1 class="product-title">{{ $product->name }}</h1>

            <div class="mb-3">
                @if($product->isOnSale())
                    <span class="product-sale-price">{{ number_format($product->sale_price, 2) }} TL</span>
                    <span class="product-original-price ms-2">{{ number_format($product->price, 2) }} TL</span>
                    <span class="badge bg-danger ms-2">%{{ $product->discountPercentage() }} İndirim</span>
                @else
                    <span class="product-price">{{ number_format($product->price, 2) }} TL</span>
                @endif
            </div>

            <div class="mb-3">
                <span class="badge {{ $product->stock > 0 ? 'bg-success' : 'bg-danger' }}">
                    {{ $product->stock > 0 ? 'Stokta' : 'Stokta Yok' }}
                </span>
                <span class="text-muted ms-2">Ürün Kodu: {{ $product->sku }}</span>
            </div>

            @if($product->short_description)
                <div class="mb-3">
                    <p>{{ $product->short_description }}</p>
                </div>
            @endif

            <form action="{{ url('/cart/add/' . $product->id) }}" method="GET">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="quantity" class="form-label">Adet</label>
                        <div class="input-group">
                            <button type="button" class="btn btn-outline-secondary quantity-btn" data-action="decrease">
                                <i class="bi bi-dash"></i>
                            </button>
                            <input type="number" class="form-control text-center quantity-input" id="quantity" name="quantity" value="1" min="1" max="{{ $product->stock }}">
                            <button type="button" class="btn btn-outline-secondary quantity-btn" data-action="increase">
                                <i class="bi bi-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary" id="add-to-cart-btn" {{ $product->stock <= 0 ? 'disabled' : '' }}>
                        <i class="bi bi-cart-plus me-2"></i>
                        {{ $product->stock > 0 ? 'Sepete Ekle' : 'Stokta Yok' }}
                    </button>
                </div>
            </form>

            <hr>

            <div class="mb-3">
                <h5>Marka:</h5>
                <p>{{ $product->brand ?? 'Belirtilmemiş' }}</p>
            </div>
        </div>
    </div>

    <!-- Ürün Açıklaması -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <ul class="nav nav-tabs card-header-tabs" id="productTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Ürün Açıklaması</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="specifications-tab" data-bs-toggle="tab" data-bs-target="#specifications" type="button" role="tab" aria-controls="specifications" aria-selected="false">Özellikler</button>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="productTabsContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                            {!! $product->description ?? 'Ürün açıklaması bulunmamaktadır.' !!}
                        </div>
                        <div class="tab-pane fade" id="specifications" role="tabpanel" aria-labelledby="specifications-tab">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>Ürün Kodu</th>
                                        <td>{{ $product->sku }}</td>
                                    </tr>
                                    <tr>
                                        <th>Marka</th>
                                        <td>{{ $product->brand ?? 'Belirtilmemiş' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Model</th>
                                        <td>{{ $product->model ?? 'Belirtilmemiş' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Miktar artırma/azaltma butonları
        const quantityBtns = document.querySelectorAll('.quantity-btn');
        const quantityInput = document.querySelector('.quantity-input');

        quantityBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const action = this.getAttribute('data-action');
                const currentValue = parseInt(quantityInput.value);

                if (action === 'increase') {
                    const maxValue = parseInt(quantityInput.getAttribute('max'));
                    if (currentValue < maxValue) {
                        quantityInput.value = currentValue + 1;
                    }
                } else if (action === 'decrease' && currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                }
            });
        });

        // Küçük resimler için carousel kontrolü
        const thumbnails = document.querySelectorAll('.img-thumbnail');
        thumbnails.forEach((thumbnail, index) => {
            thumbnail.addEventListener('click', function() {
                const carousel = new bootstrap.Carousel(document.getElementById('productCarousel'));
                carousel.to(index);
            });
        });
    });
</script>
@endpush

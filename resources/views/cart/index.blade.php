@extends('layouts.app')

@section('title', 'Sepetim')

@section('content')
<div class="container py-4">
    <h1 class="h3 mb-4">Alışveriş Sepeti</h1>

    <div class="card border-0 shadow-sm">
        <div class="card-body text-center py-5">
            <i class="bi bi-cart-x fs-1 text-muted mb-3"></i>
            <h3>Sepetiniz Boş</h3>
            <p class="text-muted">Sepetinizde henüz ürün bulunmamaktadır.</p>
            <a href="{{ url('/products') }}" class="btn btn-primary mt-3">
                <i class="bi bi-shop me-2"></i>Alışverişe Başla
            </a>
        </div>
    </div>
</div>
@endsection

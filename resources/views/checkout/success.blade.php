@extends('layouts.app')

@section('title', 'Sipariş Tamamlandı')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-5">
                    <div class="mb-4">
                        <i class="bi bi-check-circle-fill text-success" style="font-size: 5rem;"></i>
                    </div>

                    <h1 class="h3 mb-3">Siparişiniz Başarıyla Tamamlandı!</h1>
                    <p class="text-muted mb-4">Sipariş numaranız: <strong>{{ $orderNumber }}</strong></p>

                    <p>Siparişiniz için teşekkür ederiz. Siparişinizle ilgili detayları e-posta adresinize gönderdik.</p>
                    <p>Siparişinizin durumunu "Siparişlerim" sayfasından takip edebilirsiniz.</p>

                    <div class="mt-4">
                        <a href="{{ url('/') }}" class="btn btn-primary me-2">
                            <i class="bi bi-house me-2"></i>Ana Sayfaya Dön
                        </a>
                        <a href="{{ url('/orders') }}" class="btn btn-outline-primary">
                            <i class="bi bi-box me-2"></i>Siparişlerim
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

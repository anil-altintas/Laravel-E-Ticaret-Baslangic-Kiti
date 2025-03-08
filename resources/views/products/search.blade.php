@extends('layouts.app')

@section('title', 'Arama Sonuçları: ' . $query)

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <h1 class="h3 mb-4">Arama Sonuçları: "{{ $query }}"</h1>

            <div class="alert alert-info">
                <i class="bi bi-info-circle me-2"></i>
                "{{ $query }}" için sonuç bulunamadı. Lütfen başka bir arama terimi deneyin.
            </div>

            <div class="mt-4">
                <h4>Öneriler:</h4>
                <ul>
                    <li>Farklı anahtar kelimeler kullanmayı deneyin</li>
                    <li>Daha genel terimler arayın</li>
                    <li>Yazım hatası olmadığından emin olun</li>
                </ul>
            </div>

            <div class="mt-4">
                <a href="{{ url('/products') }}" class="btn btn-primary">
                    <i class="bi bi-grid me-2"></i>Tüm Ürünleri Görüntüle
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

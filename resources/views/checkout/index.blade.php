@extends('layouts.app')

@section('title', 'Ödeme')

@section('content')
<div class="container py-4">
    <h1 class="h3 mb-4">Ödeme</h1>

    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Teslimat Bilgileri</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Ad Soyad</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">E-posta</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Telefon</label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Adres</label>
                            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="city" class="form-label">Şehir</label>
                                <input type="text" class="form-control" id="city" name="city" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="country" class="form-label">Ülke</label>
                                <input type="text" class="form-control" id="country" name="country" value="Türkiye" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Ödeme Yöntemi</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="payment_method" id="credit_card" value="credit_card" checked>
                            <label class="form-check-label" for="credit_card">
                                Kredi Kartı
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="bank_transfer" value="bank_transfer">
                            <label class="form-check-label" for="bank_transfer">
                                Havale / EFT
                            </label>
                        </div>

                        <div id="credit_card_form" class="mt-3">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="card_name" class="form-label">Kart Üzerindeki İsim</label>
                                    <input type="text" class="form-control" id="card_name" name="card_name">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="card_number" class="form-label">Kart Numarası</label>
                                    <input type="text" class="form-control" id="card_number" name="card_number" placeholder="XXXX XXXX XXXX XXXX">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="expiry_month" class="form-label">Son Kullanma Ay</label>
                                    <select class="form-select" id="expiry_month" name="expiry_month">
                                        @for($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}">{{ sprintf('%02d', $i) }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="expiry_year" class="form-label">Son Kullanma Yıl</label>
                                    <select class="form-select" id="expiry_year" name="expiry_year">
                                        @for($i = date('Y'); $i <= date('Y') + 10; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="cvv" class="form-label">CVV</label>
                                    <input type="text" class="form-control" id="cvv" name="cvv" placeholder="XXX">
                                </div>
                            </div>
                        </div>

                        <div id="bank_transfer_info" class="mt-3 d-none">
                            <div class="alert alert-info">
                                <h6>Banka Hesap Bilgileri</h6>
                                <p class="mb-1">Banka: Örnek Banka</p>
                                <p class="mb-1">Şube: Merkez</p>
                                <p class="mb-1">Hesap Sahibi: Deneme E-Ticaret</p>
                                <p class="mb-1">IBAN: TR00 0000 0000 0000 0000 0000 00</p>
                                <p class="mb-0">Açıklama: Sipariş numaranızı belirtmeyi unutmayınız.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm checkout-summary">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Sipariş Özeti</h5>

                        <div class="summary-item">
                            <span>Ara Toplam</span>
                            <span>0,00 TL</span>
                        </div>

                        <div class="summary-item">
                            <span>Kargo</span>
                            <span>Ücretsiz</span>
                        </div>

                        <div class="summary-total">
                            <span>Toplam</span>
                            <span>0,00 TL</span>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-credit-card me-2"></i>Siparişi Tamamla
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Güvenli Ödeme</h5>
                        <p class="text-muted small">Tüm kredi kartı işlemleriniz 256-bit SSL sertifikası ile şifrelenerek korunmaktadır.</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <i class="bi bi-credit-card fs-3 text-primary"></i>
                            <i class="bi bi-shield-check fs-3 text-primary"></i>
                            <i class="bi bi-lock fs-3 text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const creditCardRadio = document.getElementById('credit_card');
        const bankTransferRadio = document.getElementById('bank_transfer');
        const creditCardForm = document.getElementById('credit_card_form');
        const bankTransferInfo = document.getElementById('bank_transfer_info');

        creditCardRadio.addEventListener('change', function() {
            if (this.checked) {
                creditCardForm.classList.remove('d-none');
                bankTransferInfo.classList.add('d-none');
            }
        });

        bankTransferRadio.addEventListener('change', function() {
            if (this.checked) {
                creditCardForm.classList.add('d-none');
                bankTransferInfo.classList.remove('d-none');
            }
        });
    });
</script>
@endpush

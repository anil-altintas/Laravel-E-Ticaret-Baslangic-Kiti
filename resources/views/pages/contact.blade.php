@extends('layouts.app')

@section('title', 'İletişim')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <h1 class="h3 mb-4">İletişim</h1>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">
                <div class="col-md-6 mb-4 mb-md-0">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <h4 class="mb-3">İletişim Bilgileri</h4>

                            <p><i class="bi bi-geo-alt me-2"></i> Adres: İstanbul, Türkiye</p>
                            <p><i class="bi bi-telephone me-2"></i> Telefon: +90 (212) 123 45 67</p>
                            <p><i class="bi bi-envelope me-2"></i> E-posta: info@denemeeticaret.com</p>

                            <h5 class="mt-4 mb-3">Çalışma Saatleri</h5>
                            <p>Pazartesi - Cuma: 09:00 - 18:00</p>
                            <p>Cumartesi: 10:00 - 14:00</p>
                            <p>Pazar: Kapalı</p>

                            <h5 class="mt-4 mb-3">Sosyal Medya</h5>
                            <div class="d-flex">
                                <a href="#" class="me-3 text-primary">
                                    <i class="bi bi-facebook fs-4"></i>
                                </a>
                                <a href="#" class="me-3 text-primary">
                                    <i class="bi bi-twitter fs-4"></i>
                                </a>
                                <a href="#" class="me-3 text-primary">
                                    <i class="bi bi-instagram fs-4"></i>
                                </a>
                                <a href="#" class="text-primary">
                                    <i class="bi bi-youtube fs-4"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h4 class="mb-3">Bize Ulaşın</h4>

                            <form action="{{ route('contact.send') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Ad Soyad</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">E-posta</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>

                                <div class="mb-3">
                                    <label for="subject" class="form-label">Konu</label>
                                    <input type="text" class="form-control" id="subject" name="subject" required>
                                </div>

                                <div class="mb-3">
                                    <label for="message" class="form-label">Mesaj</label>
                                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-send me-2"></i>Gönder
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm mt-4">
                <div class="card-body">
                    <h4 class="mb-3">Konum</h4>
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d385398.5897809314!2d28.731988681236395!3d41.00498228699284!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14caa7040068086b%3A0xe1ccfe98bc01b0d0!2zxLBzdGFuYnVs!5e0!3m2!1str!2str!4v1648226591487!5m2!1str!2str" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Sıkça Sorulan Sorular')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <h1 class="h3 mb-4">Sıkça Sorulan Sorular</h1>

            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item border-0 mb-3">
                            <h2 class="accordion-header" id="heading1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                    Siparişim ne zaman kargoya verilir?
                                </button>
                            </h2>
                            <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="heading1" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Siparişleriniz, ödemenizin onaylanmasından sonra genellikle 24 saat içerisinde kargoya verilmektedir. Hafta sonu ve resmi tatil günlerinde verilen siparişler, takip eden ilk iş gününde işleme alınır.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 mb-3">
                            <h2 class="accordion-header" id="heading2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                    Kargo takibini nasıl yapabilirim?
                                </button>
                            </h2>
                            <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Siparişiniz kargoya verildikten sonra, size e-posta ile kargo takip numarası gönderilecektir. Bu numara ile ilgili kargo firmasının web sitesinden veya hesabınızdaki "Siparişlerim" bölümünden takip edebilirsiniz.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 mb-3">
                            <h2 class="accordion-header" id="heading3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                    Ürün iade koşulları nelerdir?
                                </button>
                            </h2>
                            <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Satın aldığınız ürünleri, teslim tarihinden itibaren 14 gün içerisinde iade edebilirsiniz. İade etmek istediğiniz ürünlerin kullanılmamış, denenmemiş ve orijinal ambalajında olması gerekmektedir. İade işlemi için hesabınızdaki "Siparişlerim" bölümünden iade talebinde bulunabilirsiniz.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 mb-3">
                            <h2 class="accordion-header" id="heading4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                    Hangi ödeme yöntemlerini kullanabilirim?
                                </button>
                            </h2>
                            <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Sitemizde kredi kartı, banka kartı, havale/EFT ve kapıda ödeme seçeneklerini kullanabilirsiniz. Kredi kartı ile yapılan ödemelerde taksit imkanı da sunulmaktadır.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 mb-3">
                            <h2 class="accordion-header" id="heading5">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                    Sipariş verdikten sonra iptal edebilir miyim?
                                </button>
                            </h2>
                            <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Siparişiniz kargoya verilmeden önce iptal edebilirsiniz. Bunun için hesabınızdaki "Siparişlerim" bölümünden veya müşteri hizmetlerimizi arayarak iptal talebinde bulunabilirsiniz. Kargoya verilen siparişler için iade prosedürünü uygulamanız gerekmektedir.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 mb-3">
                            <h2 class="accordion-header" id="heading6">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                    Ürün değişimi yapabilir miyim?
                                </button>
                            </h2>
                            <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="heading6" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Evet, satın aldığınız ürünleri 14 gün içerisinde değiştirebilirsiniz. Değişim yapmak istediğiniz ürünlerin kullanılmamış, denenmemiş ve orijinal ambalajında olması gerekmektedir. Değişim işlemi için müşteri hizmetlerimizle iletişime geçebilirsiniz.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="heading7">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                                    Kargo ücreti ne kadar?
                                </button>
                            </h2>
                            <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="heading7" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>100 TL ve üzeri siparişlerinizde kargo ücretsizdir. 100 TL altındaki siparişlerde ise 19,90 TL kargo ücreti uygulanmaktadır.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm mt-4">
                <div class="card-body">
                    <h4>Başka Sorunuz Var mı?</h4>
                    <p>Aradığınız cevabı bulamadıysanız, müşteri hizmetlerimizle iletişime geçebilirsiniz.</p>
                    <a href="{{ route('contact') }}" class="btn btn-primary">
                        <i class="bi bi-chat-dots me-2"></i>Bize Ulaşın
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

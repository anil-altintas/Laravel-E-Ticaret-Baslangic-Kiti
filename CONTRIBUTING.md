# Katkıda Bulunma Rehberi

Laravel E-Ticaret Başlangıç Kiti'ne katkıda bulunmak istediğiniz için teşekkür ederiz! Bu rehber, projeye nasıl katkıda bulunabileceğinizi açıklamaktadır.

## Katkıda Bulunma Süreci

1. Bu repo'yu fork edin
2. Yeni bir branch oluşturun (`git checkout -b feature/amazing-feature`)
3. Değişikliklerinizi commit edin (`git commit -m 'Add some amazing feature'`)
4. Branch'inize push edin (`git push origin feature/amazing-feature`)
5. Pull Request oluşturun

## Geliştirme Ortamı

Projeyi geliştirmek için aşağıdaki adımları izleyin:

1. Projeyi klonlayın:
```bash
git clone https://github.com/kullanici/laravel-eticaret.git
cd laravel-eticaret
```

2. Bağımlılıkları yükleyin:
```bash
composer install
npm install
```

3. `.env` dosyasını oluşturun:
```bash
cp .env.example .env
```

4. Uygulama anahtarını oluşturun:
```bash
php artisan key:generate
```

5. Veritabanı tablolarını oluşturun:
```bash
php artisan migrate
```

6. Uygulamayı çalıştırın:
```bash
php artisan serve
```

## Kod Standartları

Bu projede aşağıdaki kod standartlarına uyulması gerekmektedir:

- PSR-12 kod standartları
- Laravel kodlama standartları
- Anlaşılır ve açıklayıcı değişken/fonksiyon isimleri
- Türkçe yorum satırları ve dökümantasyon
- Her fonksiyon için açıklayıcı docblock

## Pull Request Süreci

1. PR'ınız mevcut bir issue'yu çözüyorsa, lütfen PR açıklamasında issue numarasını belirtin.
2. PR'ınızın ne yaptığını açıklayın.
3. Eğer yeni bir özellik ekliyorsanız, bu özelliğin nasıl kullanılacağını açıklayın.
4. Eğer bir hata düzeltiyorsanız, hatanın nasıl oluştuğunu ve nasıl düzeltildiğini açıklayın.

## Yeni Özellik Önerileri

Yeni bir özellik önermek istiyorsanız, lütfen önce bir issue açın ve özelliğinizi detaylı bir şekilde açıklayın. Bu, diğer geliştiricilerin özelliğiniz hakkında fikir sahibi olmasını ve tartışma başlatmasını sağlar.

## Hata Raporları

Bir hata bulduysanız, lütfen bir issue açın ve aşağıdaki bilgileri içerdiğinden emin olun:

- Hatanın açıklaması
- Hatanın nasıl oluştuğu (adım adım)
- Beklenen davranış
- Gerçekleşen davranış
- Ekran görüntüleri (varsa)
- Ortam bilgileri (işletim sistemi, PHP sürümü, Laravel sürümü vb.)

## Lisans

Bu projeye katkıda bulunarak, katkılarınızın MIT lisansı altında lisanslanacağını kabul etmiş olursunuz. 

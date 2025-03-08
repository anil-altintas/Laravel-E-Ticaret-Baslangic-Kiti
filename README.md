# Laravel E-Ticaret Başlangıç Kiti

Bu proje, Laravel'e yeni başlayanlar için hazırlanmış, temel e-ticaret işlevlerini içeren bir başlangıç kitidir. Proje, Laravel framework'ünün temel özelliklerini ve MVC (Model-View-Controller) mimarisini anlamanıza yardımcı olmak amacıyla oluşturulmuştur.

![Laravel E-Ticaret](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg)

## 🎯 Proje Amacı

Bu proje, Laravel'e yeni başlayan geliştiricilerin aşağıdaki konuları öğrenmesine yardımcı olmak için tasarlanmıştır:

- Laravel MVC yapısının nasıl kullanıldığı
- Route tanımlamaları ve Controller yapısı
- Blade şablon motoru ve layout kullanımı
- Model ilişkileri (One-to-Many, Many-to-Many)
- Migration ve Seeder kullanımı
- Form işlemleri ve validasyon
- Session yönetimi (sepet işlemleri)
- Middleware kullanımı

## 🚀 Özellikler

- Apple sadeliğinde, temiz, anlaşılır tasarım
- Bootstrap 5 tabanlı, tamamen responsive yapı
- Ürün listeleme, filtreleme ve arama
- Varyasyonlu ürün desteği (renk, beden, model vb.)
- Sepet ve ödeme işlemleri
- Kategori yapısı (ana ve alt kategoriler)
- Statik sayfalar (Hakkımızda, İletişim, SSS vb.)

## 🛠️ Teknik Özellikler

- PHP 8.1+ ve Laravel 10
- MySQL veritabanı (SQLite ile de çalışabilir)
- Bootstrap 5 ve SCSS
- jQuery ve modern JavaScript
- Responsive tasarım

## 📂 Proje Yapısı

Projenin temel yapısı aşağıdaki gibidir:

```
app/
├── Http/
│   ├── Controllers/      # Controller sınıfları
│   └── Middleware/       # Middleware sınıfları
├── Models/               # Model sınıfları
database/
├── migrations/           # Veritabanı tabloları için migration dosyaları
├── seeders/              # Örnek veri oluşturmak için seeder dosyaları
resources/
├── sass/                 # SCSS dosyaları
├── js/                   # JavaScript dosyaları
└── views/                # Blade şablon dosyaları
    ├── layouts/          # Ana layout dosyaları
    ├── products/         # Ürün sayfaları
    ├── categories/       # Kategori sayfaları
    ├── cart/             # Sepet sayfaları
    ├── checkout/         # Ödeme sayfaları
    └── pages/            # Statik sayfalar
routes/
└── web.php               # Web route tanımlamaları
```

## 📚 Öğrenme Kaynakları

Bu proje, aşağıdaki Laravel kavramlarını öğrenmek için iyi bir başlangıç noktasıdır:

### 1. Route ve Controller
`routes/web.php` dosyasında tanımlanan route'lar ve bunların bağlı olduğu controller'lar, HTTP isteklerinin nasıl işlendiğini gösterir.

### 2. Blade Şablonları
`resources/views/` dizinindeki Blade şablonları, Laravel'in şablon motorunun nasıl kullanıldığını gösterir. Layout, partial ve component kullanımı örnekleri bulunmaktadır.

### 3. Model İlişkileri
`app/Models/` dizinindeki model sınıfları, veritabanı tablolarının nasıl ilişkilendirildiğini gösterir. One-to-Many, Many-to-Many ilişki örnekleri bulunmaktadır.

### 4. Migration ve Seeder
`database/migrations/` ve `database/seeders/` dizinlerindeki dosyalar, veritabanı tablolarının nasıl oluşturulduğunu ve örnek verilerin nasıl eklendiğini gösterir.

## 🔧 Kurulum

### Gereksinimler

- PHP 8.1 veya üzeri
- Composer
- Node.js ve NPM
- MySQL veritabanı (veya SQLite)

### Adımlar

1. Projeyi klonlayın:
```bash
git clone https://github.com/anil-altintas/laravel-eticaret-baslangic-kiti.git
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

4. `.env` dosyasını düzenleyerek veritabanı bilgilerinizi girin:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_eticaret
DB_USERNAME=root
DB_PASSWORD=
```

5. Uygulama anahtarını oluşturun:
```bash
php artisan key:generate
```

6. Veritabanı tablolarını oluşturun:
```bash
php artisan migrate
```

7. (Opsiyonel) Örnek verileri yükleyin:
```bash
php artisan db:seed
```

8. Uygulamayı çalıştırın:
```bash
php artisan serve
```

9. Tarayıcınızda `http://localhost:8000` adresine giderek uygulamayı görüntüleyin.

## 🧩 Proje Modülleri

### 1. Ürün Modülü
- Ürün listeleme, filtreleme ve arama
- Ürün detay sayfası
- Varyasyonlu ürün desteği

### 2. Kategori Modülü
- Ana ve alt kategoriler
- Kategori bazlı ürün listeleme

### 3. Sepet Modülü
- Ürün ekleme, güncelleme ve silme
- Sepet özeti

### 4. Ödeme Modülü
- Teslimat bilgileri formu
- Ödeme yöntemi seçimi
- Sipariş özeti

### 5. Statik Sayfalar
- Hakkımızda
- İletişim
- SSS (Sıkça Sorulan Sorular)
- Kargo ve Teslimat
- İade ve Değişim
- Gizlilik Politikası

## 🚧 Geliştirme Önerileri

Bu proje, Laravel'e yeni başlayanlar için bir başlangıç noktasıdır. Aşağıdaki özellikler eklenerek proje geliştirilebilir:

1. **Kullanıcı Hesapları**: Laravel Breeze veya Jetstream kullanarak kimlik doğrulama sistemi eklenebilir.
2. **Admin Paneli**: Ürün, kategori ve sipariş yönetimi için admin paneli geliştirilebilir.
3. **Ödeme Entegrasyonu**: Gerçek ödeme geçitleri (Iyzico, PayTR vb.) entegrasyonu yapılabilir.
4. **Resim Yükleme**: Ürün ve kategori resimleri için yükleme ve işleme fonksiyonları eklenebilir.
5. **Bildirim Sistemi**: E-posta ve anlık bildirimler eklenebilir.
6. **API Entegrasyonu**: RESTful API oluşturulabilir.

## 📝 Katkıda Bulunma

Projeye katkıda bulunmak isterseniz:

1. Bu repo'yu fork edin
2. Yeni bir branch oluşturun (`git checkout -b feature/amazing-feature`)
3. Değişikliklerinizi commit edin (`git commit -m 'Add some amazing feature'`)
4. Branch'inize push edin (`git push origin feature/amazing-feature`)
5. Pull Request oluşturun

## 📄 Lisans

Bu proje [MIT lisansı](LICENSE) altında lisanslanmıştır.

## 📞 İletişim

Sorularınız veya önerileriniz için [issues](https://github.com/anil-altintas/laravel-eticaret-baslangic-kiti/issues) bölümünü kullanabilirsiniz.

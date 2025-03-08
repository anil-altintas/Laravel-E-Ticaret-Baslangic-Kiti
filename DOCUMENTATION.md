# Laravel E-Ticaret Başlangıç Kiti Dokümantasyonu

Bu dokümantasyon, Laravel E-Ticaret Başlangıç Kiti'nin yapısını ve kullanımını açıklamaktadır. Bu proje, Laravel'e yeni başlayanlar için bir öğrenme kaynağı olarak tasarlanmıştır.

## İçindekiler

1. [Proje Yapısı](#proje-yapısı)
2. [MVC Mimarisi](#mvc-mimarisi)
3. [Route ve Controller](#route-ve-controller)
4. [Blade Şablonları](#blade-şablonları)
5. [Model İlişkileri](#model-i̇lişkileri)
6. [Migration ve Seeder](#migration-ve-seeder)
7. [Form İşlemleri](#form-i̇şlemleri)
8. [Session Yönetimi](#session-yönetimi)
9. [Middleware Kullanımı](#middleware-kullanımı)
10. [Öğrenme Kaynakları](#öğrenme-kaynakları)

## Proje Yapısı

Laravel E-Ticaret Başlangıç Kiti, standart bir Laravel projesi yapısına sahiptir. Projenin ana dizinleri ve dosyaları şunlardır:

```
app/                # Uygulama kodları
├── Http/           # HTTP ile ilgili sınıflar
│   ├── Controllers/# Controller sınıfları
│   └── Middleware/ # Middleware sınıfları
├── Models/         # Model sınıfları
config/             # Yapılandırma dosyaları
database/           # Veritabanı ile ilgili dosyalar
├── migrations/     # Veritabanı tabloları için migration dosyaları
├── seeders/        # Örnek veri oluşturmak için seeder dosyaları
public/             # Genel erişime açık dosyalar
resources/          # Kaynak dosyaları
├── sass/           # SCSS dosyaları
├── js/             # JavaScript dosyaları
└── views/          # Blade şablon dosyaları
    ├── layouts/    # Ana layout dosyaları
    ├── products/   # Ürün sayfaları
    ├── categories/ # Kategori sayfaları
    ├── cart/       # Sepet sayfaları
    ├── checkout/   # Ödeme sayfaları
    └── pages/      # Statik sayfalar
routes/             # Route tanımlamaları
└── web.php         # Web route tanımlamaları
```

## MVC Mimarisi

Laravel, MVC (Model-View-Controller) mimarisini kullanır. Bu mimari, uygulamanın üç ana bileşene ayrılmasını sağlar:

1. **Model**: Veritabanı işlemleri ve iş mantığı
2. **View**: Kullanıcı arayüzü
3. **Controller**: Kullanıcı isteklerini işleme ve model ile view arasında iletişim

Bu projede:
- **Model**: `app/Models/` dizinindeki sınıflar
- **View**: `resources/views/` dizinindeki Blade şablonları
- **Controller**: `app/Http/Controllers/` dizinindeki sınıflar

## Route ve Controller

### Route Tanımlamaları

Route'lar, `routes/web.php` dosyasında tanımlanır. Örnek bir route tanımı:

```php
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
```

Bu route, `/products` URL'sine gelen GET isteklerini `ProductController` sınıfının `index` metoduna yönlendirir.

### Controller Yapısı

Controller'lar, `app/Http/Controllers/` dizininde bulunur. Örnek bir controller:

```php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('is_active', true)->paginate(12);
        return view('products.index', compact('products'));
    }
    
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('products.show', compact('product'));
    }
}
```

## Blade Şablonları

Blade, Laravel'in şablon motorudur. Blade şablonları, `resources/views/` dizininde `.blade.php` uzantılı dosyalardır.

### Layout Kullanımı

Ana layout dosyası `resources/views/layouts/app.blade.php` dosyasıdır. Bu dosya, tüm sayfaların ortak yapısını içerir.

```php
<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
</head>
<body>
    @include('layouts.partials.header')
    
    <main>
        @yield('content')
    </main>
    
    @include('layouts.partials.footer')
</body>
</html>
```

### Partial Kullanımı

Partial'lar, tekrar eden kod bloklarını ayrı dosyalara ayırmak için kullanılır. Örneğin, header ve footer partial'ları:

```php
<!-- resources/views/layouts/partials/header.blade.php -->
<header>
    <nav>
        <!-- Menü içeriği -->
    </nav>
</header>
```

### Blade Direktifleri

Blade, PHP kodlarını daha okunabilir hale getiren direktifler sunar:

- `@if`, `@else`, `@endif`: Koşullu ifadeler
- `@foreach`, `@endforeach`: Döngüler
- `@yield`: Layout'ta içerik alanları tanımlama
- `@section`, `@endsection`: İçerik alanlarını doldurma
- `@include`: Partial'ları dahil etme

## Model İlişkileri

Laravel'de model ilişkileri, Eloquent ORM kullanılarak tanımlanır. Bu projede kullanılan ilişki türleri:

### One-to-Many İlişkisi

```php
// app/Models/Product.php
public function images()
{
    return $this->hasMany(ProductImage::class);
}

// app/Models/ProductImage.php
public function product()
{
    return $this->belongsTo(Product::class);
}
```

### Many-to-Many İlişkisi

```php
// app/Models/Product.php
public function categories()
{
    return $this->belongsToMany(Category::class);
}

// app/Models/Category.php
public function products()
{
    return $this->belongsToMany(Product::class);
}
```

## Migration ve Seeder

### Migration

Migration'lar, veritabanı tablolarını oluşturmak ve değiştirmek için kullanılır. Migration dosyaları `database/migrations/` dizininde bulunur.

```php
// database/migrations/2025_03_07_235452_create_products_table.php
public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('slug')->unique();
        $table->text('description')->nullable();
        $table->decimal('price', 10, 2);
        $table->integer('stock')->default(0);
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });
}
```

Migration'ları çalıştırmak için:

```bash
php artisan migrate
```

### Seeder

Seeder'lar, veritabanına örnek veriler eklemek için kullanılır. Seeder dosyaları `database/seeders/` dizininde bulunur.

```php
// database/seeders/ProductSeeder.php
public function run()
{
    Product::create([
        'name' => 'Örnek Ürün',
        'slug' => 'ornek-urun',
        'description' => 'Bu bir örnek ürün açıklamasıdır.',
        'price' => 99.90,
        'stock' => 10,
        'is_active' => true,
    ]);
}
```

Seeder'ları çalıştırmak için:

```bash
php artisan db:seed
```

## Form İşlemleri

Laravel'de form işlemleri, Request sınıfları ve validasyon kuralları kullanılarak yapılır.

### Form Oluşturma

```php
<form action="{{ route('checkout.process') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Ad Soyad</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <button type="submit" class="btn btn-primary">Gönder</button>
</form>
```

### Form İşleme

```php
// app/Http/Controllers/CheckoutController.php
public function process(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
    ]);
    
    // Form verilerini işleme
}
```

## Session Yönetimi

Laravel'de session yönetimi, `session()` helper fonksiyonu kullanılarak yapılır. Bu projede, sepet işlemleri için session kullanılmaktadır.

### Session'a Veri Ekleme

```php
// app/Http/Controllers/CartController.php
public function add($id, Request $request)
{
    $cart = session()->get('cart', []);
    $cart[$id] = ['quantity' => 1];
    session()->put('cart', $cart);
}
```

### Session'dan Veri Alma

```php
$cart = session()->get('cart', []);
```

### Session'dan Veri Silme

```php
session()->forget('cart');
```

## Middleware Kullanımı

Middleware'ler, HTTP isteklerini işlemeden önce veya sonra çalışan kod parçalarıdır. Bu projede, admin paneline erişimi kontrol etmek için middleware kullanılmaktadır.

### Middleware Tanımlama

```php
// app/Http/Middleware/AdminMiddleware.php
public function handle(Request $request, Closure $next)
{
    if (!auth()->check() || auth()->user()->role !== 'admin') {
        abort(403, 'Bu sayfaya erişim izniniz bulunmamaktadır.');
    }
    
    return $next($request);
}
```

### Middleware Kaydetme

```php
// app/Http/Kernel.php
protected $routeMiddleware = [
    'admin' => \App\Http\Middleware\AdminMiddleware::class,
];
```

### Middleware Kullanma

```php
// routes/web.php
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index']);
});
```

## Öğrenme Kaynakları

Laravel hakkında daha fazla bilgi edinmek için aşağıdaki kaynakları inceleyebilirsiniz:

- [Laravel Resmi Dokümantasyonu](https://laravel.com/docs)
- [Laracasts](https://laracasts.com)
- [Laravel News](https://laravel-news.com)
- [Laravel Daily](https://laraveldaily.com)
- [Laravel Türkiye](https://laravel.gen.tr) 

<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Ana Sayfa
Route::get('/', [HomeController::class, 'index'])->name('home');

// Ürün Sayfaları
Route::get('/products', function() {
    return view('products.index', [
        'products' => [],
        'categories' => []
    ]);
})->name('products.index');

Route::get('/product/{slug}', function($slug) {
    return view('products.show', [
        'product' => (object)[
            'name' => 'Örnek Ürün',
            'slug' => $slug,
            'description' => 'Bu bir örnek ürün açıklamasıdır.',
            'short_description' => 'Kısa açıklama',
            'price' => 999.90,
            'sale_price' => 799.90,
            'sku' => 'PRD-001',
            'stock' => 10,
            'brand' => 'Örnek Marka',
            'model' => 'Örnek Model',
            'has_variations' => false,
            'is_featured' => true,
            'is_active' => true,
            'categories' => collect([]),
            'variations' => collect([]),
            'images' => collect([]),
            'isOnSale' => function() { return true; },
            'discountPercentage' => function() { return 20; },
            'primaryImage' => function() { return null; }
        ],
        'relatedProducts' => collect([])
    ]);
})->name('products.show');

Route::get('/category/{slug}', function($slug) {
    return view('categories.show', [
        'category' => (object)[
            'name' => 'Örnek Kategori',
            'slug' => $slug,
            'description' => 'Bu bir örnek kategori açıklamasıdır.',
            'image' => null,
            'parent' => null,
            'id' => 1
        ],
        'products' => collect([]),
        'categories' => collect([]),
        'childCategories' => collect([])
    ]);
})->name('categories.show');

Route::get('/search', function() {
    return view('products.search', [
        'products' => collect([]),
        'query' => request('q', '')
    ]);
})->name('products.search');

// Sepet İşlemleri
Route::get('/cart', function() {
    return view('cart.index', [
        'items' => [],
        'total' => 0
    ]);
})->name('cart.index');

Route::get('/cart/add/{id}', function($id) {
    return redirect()->route('cart.index')->with('success', 'Ürün sepete eklendi!');
})->name('cart.add');

Route::post('/cart/update', function() {
    return response()->json([
        'success' => true,
        'subtotal' => '0,00 TL',
        'total' => '0,00 TL'
    ]);
})->name('cart.update');

Route::get('/cart/remove/{id}', function($id) {
    return redirect()->route('cart.index')->with('success', 'Ürün sepetten kaldırıldı!');
})->name('cart.remove');

Route::get('/cart/clear', function() {
    return redirect()->route('cart.index')->with('success', 'Sepet temizlendi!');
})->name('cart.clear');

// Ödeme ve Sipariş İşlemleri
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/checkout/success/{orderNumber}', [CheckoutController::class, 'success'])->name('checkout.success');

// Statik Sayfalar
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact/send', [PageController::class, 'sendContact'])->name('contact.send');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/shipping', [PageController::class, 'shipping'])->name('shipping');
Route::get('/returns', [PageController::class, 'returns'])->name('returns');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');

// Bülten Aboneliği
Route::post('/subscribe', function(Request $request) {
    return redirect()->back()->with('success', 'Bültenimize başarıyla abone oldunuz!');
})->name('subscribe');

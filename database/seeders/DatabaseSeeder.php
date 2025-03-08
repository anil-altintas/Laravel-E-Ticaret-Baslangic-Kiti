<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin kullanıcısı oluştur
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // Kategoriler oluştur
        $categories = [
            [
                'name' => 'Elektronik',
                'slug' => 'elektronik',
                'description' => 'Elektronik ürünler kategorisi',
            ],
            [
                'name' => 'Giyim',
                'slug' => 'giyim',
                'description' => 'Giyim ürünleri kategorisi',
            ],
            [
                'name' => 'Ev & Yaşam',
                'slug' => 'ev-yasam',
                'description' => 'Ev ve yaşam ürünleri kategorisi',
            ],
            [
                'name' => 'Kitap & Müzik',
                'slug' => 'kitap-muzik',
                'description' => 'Kitap ve müzik ürünleri kategorisi',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Ürünler oluştur
        $products = [
            [
                'name' => 'Akıllı Telefon',
                'slug' => 'akilli-telefon',
                'description' => 'Son model akıllı telefon, yüksek performans ve uzun pil ömrü.',
                'price' => 4999.90,
                'stock' => 50,
                'is_active' => true,
                'category_id' => 1,
            ],
            [
                'name' => 'Laptop',
                'slug' => 'laptop',
                'description' => 'İş ve oyun için ideal, güçlü işlemci ve yüksek çözünürlüklü ekran.',
                'price' => 8999.90,
                'stock' => 30,
                'is_active' => true,
                'category_id' => 1,
            ],
            [
                'name' => 'Erkek Tişört',
                'slug' => 'erkek-tisort',
                'description' => '%100 pamuklu, rahat ve şık erkek tişörtü.',
                'price' => 199.90,
                'stock' => 100,
                'is_active' => true,
                'category_id' => 2,
            ],
            [
                'name' => 'Kadın Elbise',
                'slug' => 'kadin-elbise',
                'description' => 'Yazlık, desenli, rahat kadın elbisesi.',
                'price' => 299.90,
                'stock' => 80,
                'is_active' => true,
                'category_id' => 2,
            ],
            [
                'name' => 'Yemek Takımı',
                'slug' => 'yemek-takimi',
                'description' => '24 parça porselen yemek takımı, bulaşık makinesinde yıkanabilir.',
                'price' => 799.90,
                'stock' => 20,
                'is_active' => true,
                'category_id' => 3,
            ],
            [
                'name' => 'Yatak Örtüsü',
                'slug' => 'yatak-ortusu',
                'description' => 'Çift kişilik, pamuklu, desenli yatak örtüsü.',
                'price' => 349.90,
                'stock' => 40,
                'is_active' => true,
                'category_id' => 3,
            ],
            [
                'name' => 'Roman',
                'slug' => 'roman',
                'description' => 'Çok satan, ödüllü roman.',
                'price' => 49.90,
                'stock' => 150,
                'is_active' => true,
                'category_id' => 4,
            ],
            [
                'name' => 'Müzik Albümü',
                'slug' => 'muzik-albumu',
                'description' => 'Yeni çıkan, popüler müzik albümü.',
                'price' => 89.90,
                'stock' => 70,
                'is_active' => true,
                'category_id' => 4,
            ],
        ];

        foreach ($products as $product) {
            $categoryId = $product['category_id'];
            unset($product['category_id']);

            $newProduct = Product::create($product);
            $newProduct->categories()->attach($categoryId);
        }
    }
}

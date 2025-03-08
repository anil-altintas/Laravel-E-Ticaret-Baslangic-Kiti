<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'old_price',
        'stock',
        'sku',
        'is_active',
        'is_featured',
        'is_new',
    ];

    /**
     * Ürüne ait kategorileri getir
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Ürüne ait sipariş detaylarını getir
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Aktif ürünleri getir
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Öne çıkan ürünleri getir
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Yeni ürünleri getir
     */
    public function scopeNew($query)
    {
        return $query->where('is_new', true);
    }

    /**
     * Stokta olan ürünleri getir
     */
    public function scopeInStock($query)
    {
        return $query->where('stock', '>', 0);
    }

    /**
     * Ürünün varyasyonları
     */
    public function variations(): HasMany
    {
        return $this->hasMany(ProductVariation::class);
    }

    /**
     * Ürünün resimleri
     */
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * Ürünün ana resmi
     */
    public function primaryImage()
    {
        return $this->hasMany(ProductImage::class)->where('is_primary', true)->first();
    }

    /**
     * İndirimli mi?
     */
    public function isOnSale(): bool
    {
        return $this->old_price !== null && $this->old_price < $this->price;
    }

    /**
     * İndirim yüzdesi
     */
    public function discountPercentage(): int
    {
        if (!$this->isOnSale()) {
            return 0;
        }

        return (int) (100 - (($this->old_price / $this->price) * 100));
    }
}

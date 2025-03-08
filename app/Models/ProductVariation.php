<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductVariation extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'name',
        'value',
        'type',
        'price',
        'stock',
        'sku',
        'image',
        'is_active',
    ];

    /**
     * Varyasyonun ait olduğu ürün
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Varyasyon resmi yoksa ürünün ana resmini döndür
     */
    public function getImageAttribute($value)
    {
        if ($value) {
            return $value;
        }

        // Ürünün ana resmini döndür
        $primaryImage = $this->product->primaryImage();

        return $primaryImage ? $primaryImage->image : null;
    }

    /**
     * Varyasyonun fiyatı yoksa ürünün fiyatını döndür
     */
    public function getPriceAttribute($value)
    {
        if ($value) {
            return $value;
        }

        return $this->product->price;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'type',
        'value',
        'min_order_amount',
        'max_uses',
        'used_times',
        'starts_at',
        'expires_at',
        'is_active',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'expires_at' => 'datetime',
    ];

    /**
     * Kuponun geçerli olup olmadığını kontrol eder
     */
    public function isValid(): bool
    {
        // Aktif değilse geçersiz
        if (!$this->is_active) {
            return false;
        }

        // Başlangıç tarihi varsa ve henüz gelmemişse geçersiz
        if ($this->starts_at && $this->starts_at->isFuture()) {
            return false;
        }

        // Bitiş tarihi varsa ve geçmişse geçersiz
        if ($this->expires_at && $this->expires_at->isPast()) {
            return false;
        }

        // Maksimum kullanım sayısı varsa ve aşılmışsa geçersiz
        if ($this->max_uses && $this->used_times >= $this->max_uses) {
            return false;
        }

        return true;
    }

    /**
     * Kupon indirim tutarını hesaplar
     */
    public function calculateDiscount(float $orderTotal): float
    {
        if ($this->type === 'percentage') {
            return ($orderTotal * $this->value) / 100;
        }

        // Sabit indirim tutarı
        return $this->value;
    }
}

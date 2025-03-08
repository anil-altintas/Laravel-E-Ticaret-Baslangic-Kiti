<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'user_id',
        'status',
        'total',
        'name',
        'email',
        'phone',
        'address',
        'city',
        'postal_code',
        'payment_method',
        'payment_status',
        'notes',
    ];

    /**
     * Siparişe ait kullanıcıyı getir
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Siparişe ait ürünleri getir
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Sipariş numarası oluştur
     */
    public static function generateOrderNumber()
    {
        $prefix = 'ORD-';
        $date = date('Ymd');
        $random = rand(1000, 9999);

        return $prefix . $date . $random;
    }

    /**
     * Sipariş durumuna göre renk sınıfı
     */
    public function getStatusColorClass(): string
    {
        return match($this->status) {
            'pending' => 'warning',
            'processing' => 'info',
            'completed' => 'success',
            'cancelled' => 'danger',
            default => 'secondary',
        };
    }

    /**
     * Ödeme durumuna göre renk sınıfı
     */
    public function getPaymentStatusColorClass(): string
    {
        return match($this->payment_status) {
            'pending' => 'warning',
            'paid' => 'success',
            'failed' => 'danger',
            default => 'secondary',
        };
    }
}

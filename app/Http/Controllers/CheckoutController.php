<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Ödeme sayfasını göster
     */
    public function index()
    {
        // Sepet boşsa ana sayfaya yönlendir
        if (!session()->has('cart') || count(session('cart')) == 0) {
            return redirect('/')->with('error', 'Sepetiniz boş. Ödeme yapmak için sepetinize ürün ekleyin.');
        }

        return view('checkout.index', [
            'total' => 0, // Gerçek uygulamada sepet toplamı hesaplanır
            'shipping' => 0, // Kargo ücreti
        ]);
    }

    /**
     * Ödeme işlemini gerçekleştir
     */
    public function process(Request $request)
    {
        // Form validasyonu
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'payment_method' => 'required|string|in:credit_card,bank_transfer',
        ]);

        // Sipariş numarası oluştur
        $orderNumber = 'ORD-' . strtoupper(substr(uniqid(), -8));

        // Gerçek uygulamada burada sipariş kaydedilir ve ödeme işlemi yapılır

        // Sepeti temizle
        session()->forget('cart');

        return redirect()->route('checkout.success', ['orderNumber' => $orderNumber]);
    }

    /**
     * Başarılı ödeme sayfasını göster
     */
    public function success($orderNumber)
    {
        return view('checkout.success', [
            'orderNumber' => $orderNumber
        ]);
    }
}

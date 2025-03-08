<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariation;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Sepeti göster
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        $items = [];

        foreach ($cart as $id => $details) {
            $product = null;
            $variation = null;

            if (isset($details['variation_id'])) {
                $variation = ProductVariation::find($details['variation_id']);
                if ($variation) {
                    $product = $variation->product;
                }
            } else {
                $product = Product::find($id);
            }

            if ($product) {
                $price = $variation ? $variation->price : ($product->sale_price ?? $product->price);
                $itemTotal = $price * $details['quantity'];
                $total += $itemTotal;

                $items[] = [
                    'id' => $id,
                    'product' => $product,
                    'variation' => $variation,
                    'quantity' => $details['quantity'],
                    'price' => $price,
                    'total' => $itemTotal
                ];
            }
        }

        return view('cart.index', compact('items', 'total'));
    }

    /**
     * Sepete ürün ekle
     */
    public function add($id, Request $request)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        $quantity = $request->input('quantity', 1);
        $variationId = $request->input('variation_id');

        $cartKey = $variationId ? $id . '_' . $variationId : $id;

        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity'] += $quantity;
        } else {
            $cart[$cartKey] = [
                'quantity' => $quantity
            ];

            if ($variationId) {
                $cart[$cartKey]['variation_id'] = $variationId;
            }
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Ürün sepete eklendi!');
    }

    /**
     * Sepetteki ürünü güncelle
     */
    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);

            $total = 0;
            foreach ($cart as $id => $details) {
                $product = null;
                $variation = null;

                if (isset($details['variation_id'])) {
                    $variation = ProductVariation::find($details['variation_id']);
                    if ($variation) {
                        $product = $variation->product;
                    }
                } else {
                    $product = Product::find($id);
                }

                if ($product) {
                    $price = $variation ? $variation->price : ($product->sale_price ?? $product->price);
                    $total += $price * $details['quantity'];
                }
            }

            return response()->json([
                'success' => true,
                'subtotal' => number_format($total, 2) . ' TL',
                'total' => number_format($total, 2) . ' TL'
            ]);
        }
    }

    /**
     * Sepetten ürün kaldır
     */
    public function remove($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Ürün sepetten kaldırıldı!');
    }

    /**
     * Sepeti temizle
     */
    public function clear()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Sepet temizlendi!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Hakkımızda sayfasını göster
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * İletişim sayfasını göster
     */
    public function contact()
    {
        return view('pages.contact');
    }

    /**
     * İletişim formunu işle
     */
    public function sendContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Gerçek uygulamada burada e-posta gönderimi yapılır

        return redirect()->route('contact')->with('success', 'Mesajınız başarıyla gönderildi. En kısa sürede size dönüş yapacağız.');
    }

    /**
     * SSS sayfasını göster
     */
    public function faq()
    {
        return view('pages.faq');
    }

    /**
     * Kargo bilgileri sayfasını göster
     */
    public function shipping()
    {
        return view('pages.shipping');
    }

    /**
     * İade koşulları sayfasını göster
     */
    public function returns()
    {
        return view('pages.returns');
    }

    /**
     * Gizlilik politikası sayfasını göster
     */
    public function privacy()
    {
        return view('pages.privacy');
    }
}

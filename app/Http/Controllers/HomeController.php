<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Ana sayfayı göster
     */
    public function index()
    {
        return view('home');
    }
}

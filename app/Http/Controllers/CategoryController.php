<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Kategori detayını ve ürünlerini göster
     */
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->where('is_active', true)->firstOrFail();

        // Alt kategorileri dahil et
        $categoryIds = [$category->id];
        $childCategories = $category->children()->where('is_active', true)->get();

        foreach ($childCategories as $child) {
            $categoryIds[] = $child->id;
        }

        // Kategoriye ait ürünleri getir
        $products = $category->products()
            ->where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        // Yan menü için tüm kategorileri getir
        $categories = Category::where('is_active', true)
            ->whereNull('parent_id')
            ->orderBy('order')
            ->get();

        return view('categories.show', compact('category', 'products', 'categories', 'childCategories'));
    }
}

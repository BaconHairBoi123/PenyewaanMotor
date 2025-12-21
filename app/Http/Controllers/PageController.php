<?php

namespace App\Http\Controllers;

use App\Models\Motorcycle;


use Illuminate\Http\Request;

class PageController extends Controller
{
    // --- Bagian Halaman Umum ---
    public function home()
    {
        $motorcycles = \App\Models\Motorcycle::latest()->take(6)->get();
        return view('user.home', compact('motorcycles'));
    }

    // Halaman About Us
    public function about()
    {
        // return view('user.about');
        // Ambil data motor sama seperti di halaman welcome
        // Sertakan eager loading 'lastService' agar tidak error saat memanggil kilometer
        $motorcycles = Motorcycle::with('lastService')->get();

        // Kirim variabel ke view user/about
        return view('user.about', compact('motorcycles'));
    }

    // Halaman Contact
    public function contact()
    {
        return view('user.contact');
    }

    // Halaman Services
    public function services()
    {
        return view('user.services');
    }

    // Halaman FAQs
    public function faq()
    {
        return view('user.faq');
    }

    // Halaman Error 404 Placeholder
    public function errorPage()
    {
        return view('user.error-page');
    }


    // --- Bagian CARS ---

    public function cars(Request $request) // Tambahkan Request $request di sini
    {
        // 1. Gunakan query() alih-alih all() agar bisa ditambah filter
        $query = Motorcycle::query();

        // 2. Logic Filter Search Category (Teks)
        if ($request->filled('category')) {
            $query->where('category', 'like', '%' . $request->category . '%');
        }

        // 3. Logic Filter Price (Range)
        if ($request->filled('min_price') && $request->filled('max_price')) {
            $min = (int) preg_replace('/[^0-9]/', '', $request->min_price);
            $max = (int) preg_replace('/[^0-9]/', '', $request->max_price);
            $query->whereBetween('price', [$min, $max]);
        }

        // 4. Logic Filter Brand
        if ($request->filled('brand')) {
            $query->whereIn('brand', $request->brand);
        }

        // 5. Logic Filter Type
        if ($request->filled('type')) {
            $query->whereIn('type', $request->type);
        }

        // 6. Logic Filter Transmission
        if ($request->filled('transmission')) {
            $query->whereIn('transmission', $request->transmission);
        }

        // 7. Logic Filter Fuel Configuration
        if ($request->filled('fuel')) {
            $query->whereIn('fuel_configuration', $request->fuel);
        }

        // 8. Ambil hasil akhirnya (bisa pakai get() atau paginate())
        // Angka 9 adalah jumlah motor per halaman
        $motorcycles = $query->paginate(9)->withQueryString();

        // 9. Kirim ke view
        return view('user.cars', compact('motorcycles'));
    }
    public function carListV1()
    {
        return view('user.car-list-v1');
    }
    public function listingSingle()
    {
        return view('user.listing-single');
    }

    // --- Bagian SHOP ---

    public function products()
    {
        return view('user.products');
    }
    public function productDetails()
    {
        return view('user.product-details');
    }
    public function cart()
    {
        return view('user.cart');
    }
    public function checkout()
    {
        return view('user.checkout');
    }
    public function wishlist()
    {
        return view('user.wishlist');
    }
    public function signUp()
    {
        return view('user.sign-up');
    }
    public function login()
    {
        return view('user.login');
    }

    // --- Bagian BLOG ---

    public function blog()
    {
        return view('user.blog');
    }
    public function blogStandard()
    {
        return view('user.blog-standard');
    }
    public function blogLeftSidebar()
    {
        return view('user.blog-left-sidebar');
    }
    public function blogRightSidebar()
    {
        return view('user.blog-right-sidebar');
    }
    public function blogDetails()
    {
        return view('user.blog-details');
    }


    /*
    |--------------------------------------------------------------------------
    | USER DASHBOARD (PROTECTED ROUTES) 🚨 KODE BARU 🚨
    |--------------------------------------------------------------------------
    | Ditambahkan untuk menangani Route yang ada di kelompok 'auth:web' di web.php
    */

    // public function home()
    // {
    //     // View untuk /user/home
    //     return view('user.home'); 
    // }

    public function profile()
    {
        // View untuk /user/profile
        return view('user.profile');
    }
    public function welcome()
    {
        $motorcycles = \App\Models\Motorcycle::with('lastService')->get();
        return view('welcome', compact('motorcycles'));
    }
}

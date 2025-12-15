<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // --- Bagian Halaman Umum ---
    public function home() { return view('user.home'); }
    
    // Halaman About Us
    public function about() { return view('user.about'); }
    
    // Halaman Contact
    public function contact() { return view('user.contact'); }

    // Halaman Services
    public function services() { return view('user.services'); } 

    // Halaman FAQs
    public function faq() { return view('user.faq'); }

    // Halaman Error 404 Placeholder
    public function errorPage() { return view('user.error-page'); }


    // --- Bagian CARS ---
    
    public function cars() { return view('user.cars'); }
    public function carListV1() { return view('user.car-list-v1'); }
    public function listingSingle() { return view('user.listing-single'); }

    // --- Bagian SHOP ---
    
    public function products() { return view('user.products'); }
    public function productDetails() { return view('user.product-details'); }
    public function cart() { return view('user.cart'); }
    public function checkout() { return view('user.checkout'); }
    public function wishlist() { return view('user.wishlist'); }
    public function signUp() { return view('user.sign-up'); }
    public function login() { return view('user.login'); }

    // --- Bagian BLOG ---
    
    public function blog() { return view('user.blog'); }
    public function blogStandard() { return view('user.blog-standard'); }
    public function blogLeftSidebar() { return view('user.blog-left-sidebar'); }
    public function blogRightSidebar() { return view('user.blog-right-sidebar'); }
    public function blogDetails() { return view('user.blog-details'); }

    
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
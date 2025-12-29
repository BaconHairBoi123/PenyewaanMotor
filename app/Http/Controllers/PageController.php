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
    // Halaman Services
    public function services(Request $request)
    {
        // 1. Static/Company Services (General Offerings)
        $companyServices = \App\Models\Service::all();
        
        // 2. Search for Motorcycle Service History by License Plate
        $serviceHistory = null;
        $motorcycle = null;
        $searchPerformed = false;

        if ($request->filled('license_plate')) {
            $searchPerformed = true;
            $plate = $request->input('license_plate');
            // Remove spaces for loose matching
            $cleanPlate = str_replace(' ', '', $plate); // e.g., B1234CD
            
            $motorcycle = \App\Models\Motorcycle::whereRaw("REPLACE(license_plate, ' ', '') LIKE ?", ['%' . $cleanPlate . '%'])
                ->first();

            if ($motorcycle) {
                $serviceHistory = \App\Models\MotorcycleService::where('motorcycle_id', $motorcycle->id)
                    ->orderBy('service_date', 'desc')
                    ->get();
            }
        }

        return view('user.services', compact('companyServices', 'serviceHistory', 'motorcycle', 'searchPerformed'));
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



    public function motorcycles(Request $request)
    {
        // Gunakan query agar bisa difilter
        $query = Motorcycle::query();

        // Filter Category (teks)
        if ($request->filled('category')) {
            $query->where('category', 'like', '%' . $request->category . '%');
        }

        // Filter Price (range)
        if ($request->filled('min_price') && $request->filled('max_price')) {
            $min = (int) preg_replace('/[^0-9]/', '', $request->min_price);
            $max = (int) preg_replace('/[^0-9]/', '', $request->max_price);
            $query->whereBetween('price', [$min, $max]);
        }

        // Filter Brand
        if ($request->filled('brand')) {
            $query->whereIn('brand', $request->brand);
        }

        // Filter Type
        if ($request->filled('type')) {
            $query->whereIn('type', $request->type);
        }

        // Filter Transmission
        if ($request->filled('transmission')) {
            $query->whereIn('transmission', $request->transmission);
        }

        // Filter Fuel
        if ($request->filled('fuel')) {
            $query->whereIn('fuel_configuration', $request->fuel);
        }

        // Pagination
        $motorcycles = $query->paginate(9)->withQueryString();

        return view('user.motorcycles', compact('motorcycles'));
    }



    public function showMotorcycle($id)
    {
        $motorcycle = \App\Models\Motorcycle::with(['images', 'services'])->findOrFail($id);
        // Fetch Accessories for the calculator
        $accessories = \App\Models\AdditionalAccessories::all();
        
        return view('user.motorcycle-single', compact('motorcycle', 'accessories'));
    }

    // --- Bagian SHOP ---



    // --- Bagian BLOG (Optional: Keep if blog is needed, remove otherwise. User asked for optimization) ---
    // Keeping for now as they might be used, but commented out if truly unused in routes.
    // For now, I will remove them to clean up as requested.

    /* 
    public function blog() { return view('user.blog'); }
    public function blogDetails() { return view('user.blog-details'); }
    */


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
        // Ubah 'home' menjadi 'user.home' agar sesuai dengan route yang baru
        if (\Illuminate\Support\Facades\Auth::check()) {
            return redirect()->route('user.home');
        }

        $motorcycles = \App\Models\Motorcycle::with('lastService')->get();
        return view('welcome', compact('motorcycles'));
    }
}

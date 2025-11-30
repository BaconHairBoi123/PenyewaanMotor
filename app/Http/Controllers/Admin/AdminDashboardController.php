<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // =====================================================
        // DASHBOARD STATISTICS (TIDAK DIUBAH)
        // =====================================================

        $totalMotorcycles = DB::table('motorcycles')->count();

        $rentedMotorcycles = DB::table('motorcycles')
            ->where('status', 'rented')
            ->count();

        $totalUsers = DB::table('users')->count();

        $todayRentals = DB::table('rentals')
            ->whereDate('created_at', date('Y-m-d'))
            ->count();

        $latestRentals = DB::table('rentals')
            ->leftJoin('users', 'rentals.user_id', '=', 'users.id')
            ->leftJoin('motorcycles', 'rentals.motorcycle_id', '=', 'motorcycles.id')
            ->select(
                'rentals.*',
                'users.name as user_name',
                'motorcycles.brand as motorcycle_brand',
                'motorcycles.type as motorcycle_type',
                'motorcycles.license_plate as motorcycle_plate'
            )
            ->orderBy('rentals.created_at', 'desc')
            ->limit(5)
            ->get();

        $todayPayments = DB::table('payments')
            ->whereDate('created_at', date('Y-m-d'))
            ->count();


        // =====================================================
        // NOTIFICATIONS (BARU)
        // =====================================================

        // 1. User menunggu verifikasi
        $notifVerifications = DB::table('user_verifications')
            ->where('status', 'unverified')
            ->count();

        // 2. Penyewaan baru hari ini
        $notifNewRentals = DB::table('rentals')
            ->whereDate('created_at', date('Y-m-d'))
            ->count();

        // 3. Pembayaran pending
        $notifPaymentsPending = DB::table('payments')
            ->where('status', 'pending')
            ->count();

        // 4. Motor perlu servis (lebih dari 2 bulan)
        $notifServiceDue = DB::table('motorcycles')
            ->whereDate('last_service_date', '<=', now()->subMonths(2))
            ->count();

        // 5. Pengembalian 3 hari lagi
        $notifReturnSoon = DB::table('rentals')
            ->whereDate('return_date', '<=', now()->addDays(3))
            ->whereDate('return_date', '>=', now())
            ->count();


        return view('admin.dashboard', compact(
            'totalMotorcycles',
            'rentedMotorcycles',
            'totalUsers',
            'todayRentals',
            'latestRentals',
            'todayPayments',

            // NOTIFICATIONS
            'notifVerifications',
            'notifNewRentals',
            'notifPaymentsPending',
            'notifServiceDue',
            'notifReturnSoon'
        ));
    }
}

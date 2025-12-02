<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DeliveryController extends Controller
{
    public function index()
    {
        $today = now()->toDateString();

        $deliveries = DB::table('rentals')
            ->join('motorcycles', 'rentals.motorcycle_id', '=', 'motorcycles.id')
            ->join('users', 'rentals.user_id', '=', 'users.id')
            ->select(
                'rentals.*',
                'motorcycles.brand',
                'motorcycles.type',
                'motorcycles.license_plate',
                'users.name as user_name'
            )
            ->whereDate('start_date', '>=', $today)
            ->orderBy('start_date', 'asc')
            ->get();

        return view('admin.delivery.index', compact('deliveries'));
    }
}

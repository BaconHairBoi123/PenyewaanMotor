<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rental;
use App\Models\BikeReturn;
use Illuminate\Support\Facades\Auth;

class BookingHistoryController extends Controller
{
    public function getHistory()
    {
        $rentals = Rental::where('user_id', Auth::id())
            ->with(['motorcycle', 'payments', 'returns'])
            ->orderBy('created_at', 'desc')
            ->get();
            
        return response()->json([
            'html' => view('user.components.booking_history_list', compact('rentals'))->render()
        ]);
    }
}

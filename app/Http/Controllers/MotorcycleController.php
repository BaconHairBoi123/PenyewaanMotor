<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motorcycle;

class MotorcycleController extends Controller
{
    //
    public function index()
{
    $motorcycles = Motorcycle::with('lastService')->get();

    return view('welcome', compact('motorcycles'));
}

}

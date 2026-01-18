<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function history()
    {
        $orders = OrderProduct::latest()->get();
        return view('user.riwayat', compact('orders'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $orders = Order::with('orderItems')->get();
        $orderItems = OrderItem::all();
        $clients = User::where('is_admin', 0)->get();

        $total_revenue = null;
        foreach($orderItems as $orderItem) {
            $total_revenue = $total_revenue + ($orderItem->price * $orderItem->quantity);
        }

        return [
            'orders_no' => $orders->count(),
            'total_revenue' => number_format($total_revenue, 0),
            'total_clients' => $clients->count()
        ];
    }
}

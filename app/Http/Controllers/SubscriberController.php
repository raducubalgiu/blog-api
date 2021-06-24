<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index() {
        return UserResource::collection(User::where('is_admin', 0)->paginate(10));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index() {
        return User::subscribers()->get();
    }
}

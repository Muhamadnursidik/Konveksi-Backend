<?php

namespace App\Http\Controllers\Pemotong;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pemotong.dashboard');
    }
}

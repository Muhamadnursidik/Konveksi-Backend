<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProdukJadi;

class ProdukJadiController extends Controller
{
    public function index()
    {
        $data = ProdukJadi::with([
            'jobProduksi.modelPakaian'
        ])->latest()->get();

        return view('admin.produk-jadi', compact('data'));
    }
}

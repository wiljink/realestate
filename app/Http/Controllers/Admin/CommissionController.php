<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CommissionController extends Controller
{
    public function index()
    {
        return view('admin.commission');
    }
}

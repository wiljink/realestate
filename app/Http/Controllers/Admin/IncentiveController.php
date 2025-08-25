<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class IncentiveController extends Controller
{
    public function index()
    {
        return view('admin.incentives');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class PropertyController extends Controller
{
    public function index()
    {
        return view('admin.properties');
    }
}

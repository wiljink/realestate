<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CollectionController extends Controller
{
    public function index()
    {
        return view('admin.collections');
    }
}

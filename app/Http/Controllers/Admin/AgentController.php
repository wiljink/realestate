<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AgentController extends Controller
{
    public function index()
    {
        return view('admin.agents');
    }
}

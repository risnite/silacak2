<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index()
    {
        return view('admin.kendaraan.index');
    }

    public function create()
    {
        return view('admin.kendaraan.create');
    }
}

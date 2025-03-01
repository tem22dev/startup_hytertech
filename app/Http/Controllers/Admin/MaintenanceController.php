<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index()
    {
        return view('admin.maintenance.index');
    }
    public function add()
    {
        return view('admin.maintenance.add');
    }
    public function detail($id)
    {
        return view('admin.maintenance.detail', ['id' => $id]);
    }
}

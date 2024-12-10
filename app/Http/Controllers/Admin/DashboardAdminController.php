<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tps;
use App\Models\Kpps;

class DashboardAdminController extends Controller
{
    public function index()
    {
        // Ambil statistik dari model
        $tpsCount = Tps::count();
      
        
        return view('admin.dashboard.index', compact(
            'tpsCount'
        ));
    }
}

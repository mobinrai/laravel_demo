<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardContoller extends Controller
{
    //
    public function index() {
        return view('admin.dashboard');
    }

    public function bookRequest(Request $request){

    }

    public function bookSaleRequest(Request $request){

    }

    public function latestSaleOrders(Request $request){

    }
}

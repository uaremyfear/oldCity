<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pagoda;
use App\Founder;

class DashboardController extends Controller
{
    public function index()
    {
    	$totalPagoda = Pagoda::count();
    	$totalFounder = Founder::count();
    	return view('admin.index',compact('totalPagoda','totalFounder'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pagoda;

class FrontendController extends Controller
{
    public function index()
    {
    	$pagodas = Pagoda::all();

    	return view('frontend.index',compact('pagodas'));
    }
}

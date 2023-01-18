<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 
 */
class HomePageController extends Controller
{
    public function home(Request $oRequest)
    {
        return view('home');
    }
}

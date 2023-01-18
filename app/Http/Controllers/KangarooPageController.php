<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;

/**
 * Class KangarooPageContropller
 */
class KangarooPageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        return view('kangaroo.list');
    }

    /**
     * 
     */
    public function show()
    {

    }

    /**
     * 
     */
    public function redirectToHomePage()
    {
        return Redirect::route('kangaroo.home');
    }

    /**
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('kangaroo.form');
    }

    public function store()
    {

    }

    /**
     * 
     */
    public function edit()
    {
        
    }

    
}

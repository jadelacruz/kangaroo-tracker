<?php

namespace App\Http\Controllers;

use App\Models\Kangaroo;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;

/**
 * Class KangarooPageContropller
 */
class KangarooController extends Controller
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
        return Response::json(['test' => 'test']);
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

    /**
     * 
     */
    public function edit(Kangaroo $oKangaroo)
    {
        try {
            return view('kangaroo.form', compact('oKangaroo'));
        } catch (ModelNotFoundException $e) {
            return abort(404);
        }
    }
    
}

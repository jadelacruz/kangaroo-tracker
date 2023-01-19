<?php

namespace App\Http\Controllers;

use App\Models\Kangaroo;
use Illuminate\Support\Facades\Redirect;

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
     * @return \Illuminate\Http\RedirectResponse
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
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Kangaroo $oKangaroo)
    {
        return view('kangaroo.form', compact('oKangaroo'));
    }
}

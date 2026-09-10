<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class LandingPageController extends Controller
{
    /**
     * Display the enterprise landing page.
     */
    public function index(): View
    {
        return view('pages.landing');
    }
}


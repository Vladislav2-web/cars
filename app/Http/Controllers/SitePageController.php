<?php

namespace App\Http\Controllers;

class SitePageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contacts()
    {
        return view('pages.contacts');
    }

    public function rules()
    {
        return view('pages.rules');
    }
}

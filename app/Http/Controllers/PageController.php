<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about', [
            'name' => 'Иван Иванов',
            'group' => 'П-31'
        ]);
    }

    public function contacts()
    {
        return view('contacts');
    }

    public function rules()
    {
        return view('rules');
    }
}
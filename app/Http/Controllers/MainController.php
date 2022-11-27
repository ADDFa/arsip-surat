<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'Dashboard',
            'style'     => 'dashboard',
            'script'    => 'dashboard'
        ];

        return view('dashboard', $data);
    }

    public function about()
    {
        $data = [
            'style' => 'about'
        ];

        return view('about', $data);
    }
}

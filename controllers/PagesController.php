<?php

namespace App\Controllers;

class PagesController
{
    public function home()
    {
        return view('index');
    }

    public function about()
    {
        $company = ['company' => 'Fedor Inc'];
        return view('about', $company);
    }

    public function contact()
    {
        return view('contact');
    }
}
<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{

    public function home()
    {
        $data = [];
        $konten = view('user.page.home', $data);
        $js = asset('controller_js/home.js');


        $put['title'] = 'Halaman Home';
        $put['konten'] = $konten;
        $put['js'] = $js;


        return view('user.template.main', $put);
    }
}

<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [];
        $konten = view('admin.page.dahsboard.index', $data);
        $js = asset('controller_js/admin/dashboard.js');


        $put['title'] = 'Halaman Dashboard';
        $put['konten'] = $konten;
        $put['js'] = $js;


        return view('admin.template.main', $put);
    }
}

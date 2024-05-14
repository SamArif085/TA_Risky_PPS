<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AkreditasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function title()
    {
        return 'Halaman Akreditasi';
    }
    public function subtitle()
    {
        return 'Add Akreditasi';
    }
    public function js()
    {
        return asset('controller_js/admin/akreditasi.js');
    }
    public function routeName()
    {
        return 'akreditasi';
    }

    public function index()
    {
        $data = [];
        $data['subtitle'] = $this->subtitle();
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.master_menu.akreditasi.index', $data);
        $js = $this->js();

        $put['title'] = $this->title();
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];
        $data['subtitle'] = $this->subtitle();
        $data['routeName'] = $this->routeName();
        $data['judulForm'] = 'Tambah';
        $konten = view('admin.page.master_menu.sertifikasi.form', $data);
        $js = $this->js();

        $put['title'] = $this->title();
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VideoProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function title()
    {
        return 'Halaman Video Profile';
    }
    public function subtitle()
    {
        return 'Video Profile';
    }
    public function js()
    {
        return asset('controller_js/admin/video_profile.js');
    }
    public function routeName()
    {
        return 'video-profile';
    }

    public function index()
    {
        $data = [];
        $data['subtitle'] = $this->subtitle();
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.video_profile.index', $data);

        $put['title'] = $this->title();
        $put['konten'] = $konten;
        $put['js'] = $this->js();

        return view('admin.template.main', $put);
    }

    public function create()
    {
        $data = [];
        $data['subtitle'] = $this->subtitle();
        $data['routeName'] = $this->routeName();
        $data['judulForm'] = 'Tambah';
        $konten = view('admin.page.video_profile.form', $data);
        $js = asset('controller_js/admin/video_profile.js');

        $put['title'] = $this->title();
        $put['konten'] = $konten;
        $put['js'] = $this->js();
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

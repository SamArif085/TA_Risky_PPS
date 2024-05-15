<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\VideoProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $data['data'] = VideoProfile::get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.profile.video_profile.index', $data);

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
        $konten = view('admin.page.profile.video_profile.form', $data);
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
        $data = $request->all();
        DB::beginTransaction();
        try {
            $insert = $data['id'] == '' ? new VideoProfile() : VideoProfile::find($data['id']);
            $insert->judul_video = $data['judul_video'];
            $insert->link_video = $data['link_video'];
            $insert->save();
            DB::commit();
            return redirect($this->routeName())->with('success', 'Data berhasil disubmit!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }
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
        $data['data'] = VideoProfile::find($id);
        $data['subtitle'] = $this->subtitle();
        $data['judulForm'] = 'Edit';
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.profile.video_profile.form', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Lab';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
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
    public function destroy(Request $request)
    {
        $id = $request->id;
        DB::beginTransaction();
        try {
            $data = VideoProfile::find($id);
            $data->delete();
            DB::commit();
            return response()->json([
                'code' => 200,
                'message' => 'Data berhasil dihapus',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'code' => 500,
                'message' => 'Terjadi kesalahan: ' . $th->getMessage(),
            ]);
        }
    }
}

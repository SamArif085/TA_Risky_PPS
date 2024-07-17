<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Milon\Barcode\DNS2D;

class SettingUserController extends Controller
{

    public function title()
    {
        return 'Setting User';
    }
    public function subtitle()
    {
        return 'Setting User';
    }
    public function js()
    {
        // return asset('controller_js/admin/Angkatan.js');
    }
    public function routeName()
    {
        return 'settingUser';
    }

    public function index()
    {
        $data['user'] = Auth::user();
        $data['subtitle'] = $this->subtitle();
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.setting.index', $data);
        $js = $this->js();

        $put['title'] = $this->title();
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $user = Auth::user();
        DB::beginTransaction();
        try {
            $user->username = $data['username'];
            if (!empty($data['password'])) {
                $user->password = bcrypt($data['password']);
            }
            $user->save();
            DB::commit();
            return redirect($this->routeName())->with('success', 'Data berhasil disubmit!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }
    }

    public function printBarcode(String $id)
    {
        // Membuat objek barcode
        $barcode = new DNS2D();

        // Mendapatkan user berdasarkan ID
        $user = User::find($id);
        if (!$user) {
            // Handle jika user tidak ditemukan
            return response()->json(['message' => 'User tidak ditemukan'], 404);
        }

        // Mendapatkan data barcode dalam format PNG base64
        $barcodeData = $barcode->getBarcodePNG($user->kode_user, "QRCODE");

        // Directory path
        $directory = public_path('barcode');

        // Check if the directory exists, if not create it
        if (!File::isDirectory($directory)) {
            File::makeDirectory($directory, 0755, true, true);
        }

        // Simpan gambar barcode sebagai file PNG
        $fileName = $directory . '/QR-' . $user->kode_user . '.png';
        file_put_contents($fileName, base64_decode($barcodeData));

        // Mengembalikan response untuk mendownload gambar PNG
        return response()->download($fileName);
    }
}

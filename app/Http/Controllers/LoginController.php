<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        $data = [];
        $konten = view('admin.page.auth.login', $data);
        return $konten;
    }

    public function authentication(Request $request)
    {

        $data = $request->all();

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);


        $userdata = DB::table('users as usr')
            ->select(['usr.*'])
            ->where('usr.username', '=', $data['username'])
            ->first();

        if ($userdata == null) {
            return redirect()->route('login')->with('error', 'Username tidak ditemukan');
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('dashboard')->with('success', 'Selamat datang ' . session('nama'));
        }

        return back()->withErrors([
            'username' => 'Username anda salah!!',
            'password' => 'Password anda salah!!',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/')->with('success', 'Berhasil Logout');
    }

    public function registrasi()
    {
        $data = [];
        $data['angkatan'] = Angkatan::get();
        $konten = view('admin.page.auth.registrasi', $data);
        return $konten;
    }
    public function registrasiStore(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'angkatan' => 'required',
            'nama_lengkap' => 'required',
            'no_induk' => 'required',
        ]);

        // jika ada data username / password yang sama di table user maka kembalikan url dan berikan alert
        $cek = DB::table('users')->where('username', $data['username'])->get();
        if (count($cek) > 0) {
            return redirect()->back()->with('error', 'Username sudah ada');
        }

        $kode = mt_rand(100000, 999999);
        DB::beginTransaction();
        try {
            $push =  new User();
            $push->nama_lengkap = $data['nama_lengkap'];
            $push->no_induk = $data['no_induk'];
            $push->kode_user = $kode;
            $push->angkatan = $data['angkatan'];
            $push->username = $data['username'];
            $push->password = bcrypt($data['password']);
            $push->role = 3;
            $push->save();
            DB::commit();

            return redirect()->route('login')->with('success', 'Akun berhasil dibuat');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Akun gagal dibuat');
        }
    }
}

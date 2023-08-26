<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function listDaftarMahasiswa(Request $request)
    {
        // echo Auth::user()->id . "<br>";
        // echo Auth::user()->name . "<br>";
        // echo Auth::user()->email . "<br>";
        // echo Auth::user()->password . "<br>";

        // ? Alternatif lain bisa menggunakan Request object
        // echo $request->user()->name;

        // dump(Auth::user());


        // Auth ini juga bisa untuk mengecek apakah user sudah login apa belum
        if (Auth::check()) {
            echo "Selemat datang " . $request->user()->name;
        } else {
            echo "Silahkan login terlebih dahulu";
        }
    }
    public function tabelMahasiswa()
    {
        return view('Mahasiswa.tabel', ['judul' => 'Tabel Mahasiswa']);
    }
    public function blogMahasiswa()
    {
        return view('Mahasiswa.blog', ['judul' => 'Blog Mahasiswa']);
    }
}
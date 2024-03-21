<?php

namespace App\Http\Controllers;
use App\Models\Galeri;
use Illuminate\Http\Request;


class layout extends Controller
{
    public function tambah_galeri(){
        return view('admin.tambah_galeri');
    } 

    public function tabel_galeri(){
        $galeris = Galeri::paginate(3);
        return view ('admin.tabel_galeri', compact('galeris'));
    }

    public function setelah_login(){
        $galeris = Galeri::paginate(12);
        return view ('admin.setelah_login', compact('galeris'));
    }

    public function index(){
        $galeris = Galeri::paginate(12);
        return view ('user.index', compact('galeris'));
    }
}


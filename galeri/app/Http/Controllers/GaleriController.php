<?php

namespace App\Http\Controllers;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
 

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeris = Galeri::all();
        return view ('user.index', compact('galeris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function setelah_login()
    {
        $galeris = Galeri::all();
        return view ('admin.setelah_login', compact('galeris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Galeri();
        $data ->lokasiFile=$request->file('lokasiFile')->store('public/gambar');
        $data ->judulFoto=$request->judulFoto;
        $data ->deskripsiFoto=$request->deskripsiFoto;
        $data ->save();

        return redirect()->back();
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
        $data = Galeri::find($id);
        return view('admin.edit_galeri', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'gallery' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Cari produk yang ingin diedit
        $data = Galeri::find($id);
    
        $data ->judulFoto=$request->judulFoto;
        $data ->deskripsiFoto=$request->deskripsiFoto;
        if ($request->hasFile('lokasiFile')) {
            Storage::delete($data->lokasiFile); 
            $data->lokasiFile = $request->file('lokasiFile')->store('public/gambar');
         }
            $data ->save();
    
            return redirect()->route('admin.tabel_galeri');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Galeri::find($id)->delete();
        return redirect()->route('admin.tabel_galeri');
    }
}

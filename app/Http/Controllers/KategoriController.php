<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = "Kategori";
        $kategoris = Kategori::latest()->paginate(5)->fragment('kategori');
        $nomor = 1;
        return view('backend.kategori.index', compact('kategoris','nomor','judul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paren = DB::table('kategoris')->get();
        return view('backend.kategori.add', compact('paren'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        #Validasi
        $this->validate($request,[
            'nama_lokasi'  =>'required|min:2',
            'latitude'  =>'required|min:2',
            'longitude'  =>'required|min:2',
            'gambar'  =>'required|min:2',
            'id_kategori' =>'required|min:1',
            'icon'      =>'required|min:1',
        ]);
        # Simpan Kategori
        Kategori::create([
            'nama_lokasi'  => $request->nama_lokasi,
            'latitude'      => $request->latitude,
            'longitude' => $request->longitude,
            'gambar' => $request->gambar,
            'id_kategori' => $request->id_kategori,
            'icon' => $request->icon
        ]);

        #Kembali Ke halaman Index
        return redirect('/lokasi')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        //
    }
}

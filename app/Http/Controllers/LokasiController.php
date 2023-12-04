<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LokasiController extends Controller
{
    public function index()
    {
        $judul = "Lokasi";
        $lokasi = Lokasi::latest()->paginate(5)->fragment('lokasi');
        $nomor = 1;
        return view('backend.lokasi.index', compact('lokasi','nomor','judul'));
    }

    public function create()
    {
        $kategori = DB::table('kategoris')->get();
        return view('backend.lokasi.add', compact('kategori'));
    }

    public function store(Request $request)
    {
        #Validasi
        $this->validate($request,[
            'kategori'  =>'required|min:2',
            'icon'      =>'required|min:1',
            'parent_id' =>'required|min:1'
        ]);
        # Simpan Kategori
        Kategori::create([
            'kategori'  => $request->kategori,
            'icon'      => $request->icon,
            'parent_id' => $request->parent_id
        ]);

        #Kembali Ke halaman Index
        return redirect('/kategori')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::latest()->paginate(5)->fragment('kategori');
        $nomor = 1;
        return view('backend.kategori.index', compact('kategoris','nomor'));
    }

    public function create()
    {
        $paren = DB::table('kategoris')->get();
        return view('backend.kategori.add', compact('paren'));
    }

    public function store(Request $request)
    {
        #Validasi
        $this->validate($request,[
            'kategori'  =>'required|min:2',
            'icon'  =>'required|min:2',
            'parent_id'  =>'required|min:1',
        ]);
        # Simpan Kategori
        Kategori::create([
            'kategori'  => $request->kategori,
            'icon'      => $request->icon,
            'parent_id' => $request->parent_id,
        ]);
        #Kembali Ke halaman Index
        return redirect('/kategori')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(Kategori $kategori)
    {
        //
    }

    public function edit(Kategori $kategori)
    {
        //
    }

    public function update(Request $request, Kategori $kategori)
    {
        //
    }

    public function destroy(Kategori $kategori)
    {
        //
    }
}

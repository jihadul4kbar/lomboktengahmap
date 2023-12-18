<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
{
    public function index(){
        // $areas = Area::latest()->paginate(5)->fragment('area');
        $kategori = DB::table('areas')
            ->join('areas', 'areas.id_kategori', '=', 'kategoris.id')
            ->select('*')
            ->get();
        $nomor = 1;
        return view('backend.area.index', compact('kategori','nomor'));
    }

    public function create()
    {
        $kategori = DB::table('kategoris')->get();
        return view('backend.area.add', compact('kategori'));
    }

    public function store(Request $request)
    {
        #Validasi
        $this->validate($request,[
            'nama_area'  => 'required|min:2',
            'data'  => 'required|min:2',
            'ket'  => 'required|min:2',
            'id_kategori'  => 'required|min:1',
        ]);
        # Simpan Kategori
        Area::create([
            'nama_area'  => $request->nama_area,
            'data'      => $request->data,
            'ket'      => $request->ket,
            'id_kategori' => $request->id_kategori,
        ]);
        #Kembali Ke halaman Index
        return redirect('/area')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}

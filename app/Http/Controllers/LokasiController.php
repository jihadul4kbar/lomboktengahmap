<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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
        $pengaturan = DB::table('pengaturans')->where('id', 1)->first();
        $kategori = DB::table('kategoris')->get();
        return view('backend.lokasi.add', compact('kategori','pengaturan'));
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama_lokasi' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'gambar'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_kategori'     => 'required',
            'icon'   => 'required',
        ]);
        //check if validation fails
        // if ($validator->fails()) {
        //     return redirect('lokasi/create')
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }
        //upload gambar
        $image = $request->file('gambar');
        $image->storeAs('public/gambar', $image->hashName());
        //create 
        $lokasi = Lokasi::create([
            'nama_lokasi' => $request->nama_lokasi,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'gambar'     => $image->hashName(),
            'id_kategori'     => $request->id_kategori,
            'icon'   => $request->icon,
        ]);

        return redirect('/lokasi')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}

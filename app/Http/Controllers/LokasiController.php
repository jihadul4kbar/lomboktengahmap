<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class LokasiController extends Controller
{
    public function index()
    {
        $judul = "Lokasi";
        // $lokasi = Lokasi::latest()->paginate(5)->fragment('lokasi');
        $lokasi =DB::table('lokasis')
                ->join('kategoris', 'id_kategori', '=', 'kategoris.id')
                ->select('lokasis.id','lokasis.diskripsi', 'lokasis.nama_lokasi','lokasis.latitude','lokasis.longitude','lokasis.gambar','lokasis.icon','kategoris.kategori')
                ->paginate(5);
        $nomor = 1;
        return view('backend.lokasi.index', compact('lokasi','nomor','judul'));

        dd($lokasi);
    }
    public function create()
    {
        $pengaturan = DB::table('pengaturans')->where('id', 1)->first();
        $kategori = DB::table('kategoris')->get();
        return view('backend.lokasi.add', compact('kategori','pengaturan'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_lokasi' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'gambar'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'diskripsi' => 'required',
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
        $image->storeAs('public/lokasi/', $image->hashName());
        //create 
        $lokasi = Lokasi::create([
            'nama_lokasi' => $request->nama_lokasi,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'gambar'     => $image->hashName(),
            'diskripsi' => $request->diskripsi,
            'id_kategori'     => $request->id_kategori,
            'icon'   => $request->icon,
        ]);
        return redirect('/lokasi')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    public function destroy($id): RedirectResponse
    {
        $lokasi = Lokasi::findOrFail($id);
        Storage::delete('public/lokasi/'.basename($lokasi->gambar));
        $lokasi->delete();
        return redirect()->route('lokasi.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

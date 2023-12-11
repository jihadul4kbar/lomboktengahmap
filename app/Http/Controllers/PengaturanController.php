<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PengaturanController extends Controller
{
    //
    public function index(){
        $pengaturan = DB::table('pengaturans')->where('id', 1)->first();
        return view('backend.pengaturan.index', compact('pengaturan'));
    }

    public function update(Request $request){
        $request->validate([
            'logo' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);

        // $logo = time().'.'.$request->logo->extension();  
        // $tes = $request->logo->move(public_path('img/logo'), $logo);

        //check if gambar is not empty
        $pengaturan = DB::table('pengaturans')->where('id',$request->id);
        if ($request->hasFile('logo')) {
            //upload gambar
            $image = $request->file('logo');
            $image->storeAs('img/logo', $image->hashName());
            //delete old gambar
            Storage::delete('img/logo/'.basename($pengaturan->logo));
            //update berita with new gambar
            DB::table('pengaturans')->where('id',$request->id)->update([
                'nama_app' => $request->nama_app,
                'singkatan' => $request->singkatan,
                'logo' => $image->hashName(),
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'zoom' => $request->zoom
            ]);
        } else {
            //update 
            DB::table('pengaturans')->where('id',$request->id)->update([
                'nama_app' => $request->nama_app,
                'singkatan' => $request->singkatan,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'zoom' => $request->zoom
            ]);
        }

        
        
        return redirect('/pengaturan');
    }
}

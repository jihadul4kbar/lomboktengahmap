<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $logo = time().'.'.$request->logo->extension();  
        $tes = $request->logo->move(public_path('img/logo'), $logo);

        DB::table('pengaturans')->where('id',$request->id)->update([
            'nama_app' => $request->nama_app,
            'singkatan' => $request->singkatan,
            'logo' => $logo,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'zoom' => $request->zoom
        ]);
        return redirect('/pengaturan');
    }
}

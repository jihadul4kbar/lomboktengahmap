<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $setting = DB::table('pengaturans')->where('id', 1)->first();
        return view('index',compact('setting') );
    }
}

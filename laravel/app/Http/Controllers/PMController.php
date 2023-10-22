<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PMController extends Controller
{
    //
    public function index(){
        $jurusan = DB::table('jurusan')->get();
        $siswa = DB::table('siswa')->get();
        $kriterias = DB::table('kriterias')->get();
        return view('pages.pm.index',compact('jurusan','siswa','kriterias'));
    }
    public function rekomendasi(){
        $siswa = DB::table('siswa')->get();
        $jurusan = DB::table('jurusan')->get();
        return view('pages.pm.rekomendasi',compact('jurusan','siswa'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiswaModel;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    //
    function index(){
        $siswas = SiswaModel::all();
        return view('pages.siswa.index',compact('siswas'));
    }
    function nilai(){
        $nilais = DB::table('nilai')->Join('siswa','siswa.id','=','nilai.id_siswa')
        ->join('kriterias as c','c.id','=','nilai.id_kriteria')
        ->select('nilai','nama','kriteria','nilai.id')->get();
        return view('pages.nilai.index',compact('nilais'));
    }
    function addNilai(){
        return view('pages.nilai.addNilai');
    }
}

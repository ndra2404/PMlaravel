<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiswaModel;
use App\Models\NilaiModel;
use App\Models\NilaiMinimalModel;
use App\Models\BobotModel;

use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    //
    function index(request $request){
        if ($request->isMethod('post')) {
            if($request->input('id_siswa')!=0){
                $s = SiswaModel::find($request->input('id_siswa'));
                $s->nama = $request->input('nama');
                $s->asal_sekolah = $request->input('asal_sekolah');
                $s->save();
                return redirect('/siswa')->with('status', 'Data berhasil diubah');
            }else{
                $s = new SiswaModel();
                $s->nama = $request->input('nama');
                $s->asal_sekolah = $request->input('asal_sekolah');
                $s->save();
                return redirect('/siswa')->with('status', 'Data berhasil ditambahkan');
            }
        }
        $siswas = SiswaModel::all();
        return view('pages.siswa.index',compact('siswas'));
    }
    function deleteSiswa($id){
        $post = SiswaModel::findOrFail($id);
        $post->delete();
        return redirect('/siswa')->with('status', 'Data berhasil dihapus');
    }
    function kriteria(){
        $siswas = DB::table('kriterias')->get();
        $jurusan = DB::table('jurusan')->get();
        return view('pages.kriteria.index',compact('siswas','jurusan'));
    }
    function bobot(){
        $siswas = BobotModel::all();
        return view('pages.kriteria.bobot',compact('siswas'));
    }
    function nilai(){
        $nilais = DB::table('nilai')->Join('siswa','siswa.id','=','nilai.id_siswa')
        ->join('kriterias as c','c.id','=','nilai.id_kriteria')
        ->select('nilai','nama','kriteria','nilai.id')->get();
        return view('pages.nilai.index',compact('nilais'));
    }
    function nilaiMinimal(){
        $nilais = DB::table('nilai')->Join('siswa','siswa.id','=','nilai.id_siswa')
        ->join('kriterias as c','c.id','=','nilai.id_kriteria')
        ->select('nilai','nama','kriteria','nilai.id')->get();
        $jurusan = DB::table('jurusan')->get();
        return view('pages.nilai.nilaiMinimal',compact('nilais','jurusan'));
    }
    function addNilaiMinimal($id,Request $request){
        if ($request->isMethod('post')) {
            print_r($request->all());
            foreach($request->input('kriteria') as $key=>$value){
                $nm = new nilaiMinimalModel();
                $nm->id_jurusan = $id;
                $nm->id_kriteria = $key;
                $nm->nilai = $value;
                $nm->save();
            }
            return redirect('/nilaiMinimal')->with('status', 'Data berhasil ditambahkan');
        }
        $kriterias = DB::table('kriterias')->get();
        $jenisInt = DB::table('jenis')->where('jenis',0)->get();
        $jenisHuruf = DB::table('jenis')->where('jenis',1)->get();
        return view('pages.nilai.addNilaiMinimal',compact('kriterias','jenisInt','jenisHuruf'));
    }
    function addNilai(Request $request){
        if ($request->isMethod('post')) {
            foreach($request->input('kriteria') as $key=>$value){
                $nm = new NilaiModel();
                $nm->id_siswa = $request->input('siswa');
                $nm->id_kriteria = $key;
                $nm->nilai = $value;
                $nm->save();
            }
            return redirect('/nilai')->with('status', 'Data berhasil ditambahkan');
        }
        $kriterias = DB::table('kriterias')->get();
        $jenisInt = DB::table('jenis')->where('jenis',0)->get();
        $jenisHuruf = DB::table('jenis')->where('jenis',1)->get();
        $siswas = DB::table('siswa')->get();
        return view('pages.nilai.addNilai',compact('kriterias','jenisInt','jenisHuruf','siswas'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\JurusanModel;

class JurusanController extends Controller
{
    //
    function index(Request $request){
        if ($request->isMethod('post')) {
            if($request->input('id_siswa')!=0){
                $s = JurusanModel::find($request->input('id_siswa'));
                $s->jurusan = $request->input('nama');
                $s->save();
                return redirect('/jurusan')->with('status', 'Data berhasil diubah');
            }else{
                $s = new JurusanModel();
                $s->jurusan = $request->input('nama');
                $s->save();
                return redirect('/jurusan')->with('status', 'Data berhasil ditambahkan');
            }
        }
        $siswas = DB::table('jurusan')->get();
        return view('pages.jurusan.index',compact('siswas'));
    }
    function delete($id){
        $post = JurusanModel::findOrFail($id);
        $post->delete();
        return redirect('/jurusan')->with('status', 'Data berhasil dihapus');
    }
}

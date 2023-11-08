<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('/');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    public function home()
    {
        return view('pages.home');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function users(request $request){
        if ($request->isMethod('post')) {
            if($request->input('id_siswa')!=0){
                $s = User::find($request->input('id_siswa'));
                $s->name = $request->input('nama');
                $s->email = $request->input('asal_sekolah');
                $s->level = $request->input('level');
                if($request->input('password')!=""){
                    $s->password =  Hash::make($request->input('password'));
                }
                $s->save();
                return redirect('/users')->with('status', 'Data berhasil diubah');
            }else{
                $s = new User();
                $s->name = $request->input('nama');
                $s->email = $request->input('asal_sekolah');
                $s->password =  Hash::make($request->input('password'));
                $s->level = $request->input('level');
                $s->save();
                return redirect('/users')->with('status', 'Data berhasil ditambahkan');
            }
        }
        $levels = DB::table('level')->get();
        $siswas = DB::table('users as a')->leftJoin('level as c','c.id','=','a.level')->select('a.id','a.email','a.name','c.level','c.id as id_level')->get();
        return view('pages.users.index',compact('siswas','levels'));
    }
    function usersDelete($id,Request $reg){
        User::where('id',$id)->delete();
        return redirect('/users');
    }
}

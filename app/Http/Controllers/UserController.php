<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
class UserController extends Controller
{
     public function index ()
    {
        $users = Users::all();
        return view('users.index', [
            'users' => $users
        ]);
    }
        public function tambah()
    {
        return view('users.form_tambah');
    }
    public function simpan(Request $request)
    {
        $request->validate([
            
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'tanggal_lahir' => 'required|date',
            'umur' => 'required',
            'jenis_kelamin' => 'required',
            'foto_profil' => 'required',
            'website' => 'required',
            'biografi' => 'required',
        ]);

        Users::create([
            
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password,
            'tanggal_lahir' => $request->tanggal_lahir,
            'umur' => $request->umur,
            'jenis_kelamin' => $request->jenis_kelamin,
            'foto_profil' => $request->foto_profil,
            'website' => $request->website,
            'biografi' => $request->biografi,
        ]);
        return redirect('/users');
    }
}
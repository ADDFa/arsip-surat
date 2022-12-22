<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Credential;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Data Pengguna | Arsip Surat',
            'users' => User::with('credential')->get()
        ];

        return view('users.user', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title'     => 'Tambah Data Pengguna | Arsip Surat'
        ];

        return view('users.user-insert', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        // validasi
        $request->validate([
            'name'      => 'required|max:255',
            'role'      => 'required|max:20',
            'username'  => 'required|max:255',
            'email'     => 'email:rfc|required|max:255'
        ]);

        // susun data dan masukkan kedalam database
        $userData = [
            'name'      => $request->name,
            'avatar'    => 'samsudin.jpg',
            'role'      => $request->role
        ];

        $user = User::create($userData);

        $creadentialData = [
            'username'  => $request->username,
            'email'     => $request->email,
            'password'  => password_hash('password', PASSWORD_DEFAULT),
            'user_id'   => $user->id
        ];

        Credential::create($creadentialData);

        return redirect('/pengguna')->withInput()->with([
            'icon'      => 'success',
            'message'   => 'Berhasil Menambahkan Data Pengguna'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $data = [
            'title'     => 'Detail Pengguna',
            'user'      => User::with('credential')->where('id', '=', $user->id)->first()
        ];

        return view('users.user-detail', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/pengguna')->with([
            'icon'      => 'success',
            'message'   => 'Berhasil Menghapus Data Pengguna'
        ]);
    }
}

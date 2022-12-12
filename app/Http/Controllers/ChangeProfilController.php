<?php

namespace App\Http\Controllers;

use App\Models\Credential;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

class ChangeProfilController extends Controller
{
    public function show(Credential $credential)
    {
        $credential = Credential::with('user')->where('username', $credential->username)->first()->toJson();
        $data = [
            'title'         => 'Profil User | Arsip Surat',
            'credential'    => json_decode($credential)
        ];

        return view('users.user-profile', $data);
    }

    public function edit(Credential $credential)
    {
        $credential = Credential::with('user')->where('username', $credential->username)->first()->toJson();
        $data = [
            'title'         => 'Edit Profil | Arsip Surat',
            'credential'    => json_decode($credential),
            'edit'          => true
        ];

        return view('users.user-profile', $data);
    }

    public function update(Request $request, Credential $credential)
    {
        // cek password valid
        if (!password_verify($request->oldPassword, $credential->password)) {
            return redirect()->back()->withInput()->with([
                'icon'    => 'error',
                'message'   => 'Password Salah! <br> Gagal Merubah Data'
            ]);
        };

        // cek validasi data
        $validation = [
            'name'          => 'required|max:255',
            'username'      => 'required|max:255',
            'email'         => 'required|max:255|email:rfc'
        ];

        // susun data
        $credentialData = [
            'username'  => $request->username,
            'email'     => $request->email
        ];

        $userData = [
            'name'      => $request->name
        ];

        // cek apakah password diupdate
        if (!is_null($request->changePassword)) {
            $validation += ['password' => 'min:8|max:255'];
            $credentialData += ['password' => password_hash($request->changePassword, PASSWORD_DEFAULT)];
        };

        // cek apakah gambar diupdate
        if ($request->hasFile('avatar')) {
            Validator::validate($request->file(), [
                'avatar' => [
                    File::image()
                        ->max(1024)
                ]
            ]);
            $path = $request->avatar->store('public/images');
            $path = explode('/', $path);
            $userData += ['avatar' => end($path)];

            // delete old image
            $user = User::where('id', $credential->user_id)->get('avatar')->first()->toArray();
            if ($user['avatar'] !== 'samsudin.jpg') Storage::delete('public/images/' . $user['avatar']);
        }

        $request->validate($validation);

        // insert data
        Credential::where('user_id', $credential->user_id)->update($credentialData);
        User::where('id', $credential->user_id)->update($userData);

        // update session
        $user = User::where('id', $credential->user_id)->get(['id', 'name', 'avatar', 'role'])->first()->toArray();
        $user += ['username' => $request->username];
        $request->session()->forget('user');
        $request->session()->put('user', (object) $user);

        return redirect()->back()->with([
            'icon'      => 'success',
            'message'   => 'Berhasil Memperbaharui Profil'
        ]);
    }
}

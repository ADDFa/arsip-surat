<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    private $about;

    public function __construct()
    {
        $this->about = About::all()->first();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = [
            'title'     => 'Tentang SMAN 8 Bengkulu',
            'about'     => $this->about
        ];

        return view('abouts.about', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $data = [
            'title'     => 'Ubah Data SMAN 8 Bengkulu',
            'about'     => $this->about
        ];

        return view('abouts.about-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        $request->validate([
            'noTelp'        => 'required|max:30',
            'email'         => 'required|max:50',
            'address'       => 'required',
            'headMaster'    => 'required|max:50',
            'nipHeadMaster' => 'required|max:30'
        ]);

        $about = $about->first();

        $about->telephone_number = $request->noTelp;
        $about->email            = $request->email;
        $about->address          = $request->address;
        $about->head_master      = $request->headMaster;
        $about->nip              = $request->nipHeadMaster;

        $about->save();

        return redirect('/tentang')->with([
            'icon'      => 'success',
            'message'   => 'Berhasil Mengubah Data SMAN 8 Bengkulu'
        ]);
    }
}

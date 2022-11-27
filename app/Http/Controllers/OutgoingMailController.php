<?php

namespace App\Http\Controllers;

use App\Models\OutgoingMail;
use Illuminate\Http\Request;

class OutgoingMailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'style' => 'mails/outgoing'
        ];

        return view('mails.outgoing', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mails.outgoing-insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OutgoingMail  $outgoingMail
     * @return \Illuminate\Http\Response
     */
    public function show(OutgoingMail $outgoingMail)
    {
        return view('mails.outgoing-detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OutgoingMail  $outgoingMail
     * @return \Illuminate\Http\Response
     */
    public function edit(OutgoingMail $outgoingMail)
    {
        return view('mails.outgoing-edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OutgoingMail  $outgoingMail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OutgoingMail $outgoingMail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OutgoingMail  $outgoingMail
     * @return \Illuminate\Http\Response
     */
    public function destroy(OutgoingMail $outgoingMail)
    {
        //
    }

    public function report()
    {
        $data = [
            'style' => 'mails/outgoing-report'
        ];

        return view('mails.outgoing-report', $data);
    }
}

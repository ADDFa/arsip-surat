<?php

namespace App\Http\Controllers;

use App\Models\IncomingMail;
use Illuminate\Http\Request;

class IncomingMailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'style' => 'mails/incoming'
        ];

        return view('mails.incoming', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mails.incoming-insert');
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
     * @param  \App\Models\IncomingMail  $incomingMail
     * @return \Illuminate\Http\Response
     */
    public function show(IncomingMail $incomingMail)
    {
        return view('mails.incoming-detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IncomingMail  $incomingMail
     * @return \Illuminate\Http\Response
     */
    public function edit(IncomingMail $incomingMail)
    {
        return view('mails.incoming-edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IncomingMail  $incomingMail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IncomingMail $incomingMail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IncomingMail  $incomingMail
     * @return \Illuminate\Http\Response
     */
    public function destroy(IncomingMail $incomingMail)
    {
        //
    }

    public function report()
    {
        $data = [
            'style' => 'mails/incoming-report'
        ];

        return view('mails.incoming-report', $data);
    }
}

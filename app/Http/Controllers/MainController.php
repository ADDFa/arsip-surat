<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Disposition;
use App\Models\IncomingMail;
use App\Models\OutgoingMail;
use App\Models\About;

class MainController extends Controller
{
    private int $oneDay = 86400;

    private function getMailsToday()
    {
        $now = time() - $this->oneDay;

        $incomingMailsToday = IncomingMail::where('date', '>', $now)->where('date', '<', time())->get();
        $outgoingMailsToday = OutgoingMail::where('date', '>', $now)->where('date', '<', time())->get();

        $mailsToday = [];
        foreach ($incomingMailsToday as $incomingMailToday) {
            array_push($mailsToday, $incomingMailToday);
        }
        foreach ($outgoingMailsToday as $outgoingMailToday) {
            array_push($mailsToday, $outgoingMailToday);
        }

        return $mailsToday;
    }

    private function getMailsThisYear()
    {
        $oneYear = time() - $this->oneDay * 365;
        $mails = IncomingMail::where('date', '>', $oneYear)->get()->toArray();

        $mailsThisYear = [
            'jan'   => 0,
            'feb'   => 0,
            'mar'   => 0,
            'apr'   => 0,
            'mei'   => 0,
            'jun'   => 0,
            'jul'   => 0,
            'aug'   => 0,
            'sep'   => 0,
            'okt'   => 0,
            'nov'   => 0,
            'des'   => 0,
        ];

        return $mailsThisYear;
    }

    public function index()
    {
        $data = [
            'title'                 => 'Dashboard | Arsip Surat',
            'amount'                => (object) [
                'user'              => User::all()->count(),
                'disposition'       => Disposition::all()->count(),
                'incoming'          => IncomingMail::all()->count(),
                'outgoing'          => OutgoingMail::all()->count(),
            ],
            'mailsToday'            => $this->getMailsToday(),
            'mailsThisYears'        => $this->getMailsThisYear()
        ];

        return view('dashboard', $data);
    }
}

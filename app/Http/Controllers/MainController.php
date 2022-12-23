<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Disposition;
use App\Models\IncomingMail;
use App\Models\OutgoingMail;
use Illuminate\Http\Request;

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

    protected function getMailsThisYear()
    {
        function getMailsThisMonth(array $mails, array $range): int
        {
            $mailsInThisMont = array_filter($mails, function ($key) use ($mails, $range) {
                return $mails[$key]['date'] >= $range[0] && $mails[$key]['date'] < $range[1];
            }, ARRAY_FILTER_USE_KEY);

            return count($mailsInThisMont);
        }

        function getRangeMonth(int $month, $year): array
        {
            $nextMonth = $month + 1;

            $start = strtotime("1-$month-$year 00:00:00");
            $end = strtotime("1-$nextMonth-$year 00:00:00") - 1;

            if ($nextMonth > 12) {
                $nextMonth = 1;
                $year += 1;

                $end = strtotime("1-$nextMonth-$year 00:00:00") - 1;
            }

            return [$start, $end];
        }

        $year = date('Y');
        $mails = IncomingMail::where('date', '>', strtotime("1-1-$year"))->where('date', '<', strtotime("31-12-$year"))->get()->toArray();

        $mailsThisYear = [
            'jan' => 0,
            'feb' => 0,
            'mar' => 0,
            'apr' => 0,
            'may' => 0,
            'jun' => 0,
            'jul' => 0,
            'aug' => 0,
            'sep' => 0,
            'oct' => 0,
            'nov' => 0,
            'dec' => 0,
        ];

        $month = 1;
        foreach ($mailsThisYear as $key => $val) {
            $result = getMailsThisMonth($mails, getRangeMonth($month, $year));
            $mailsThisYear[$key] = (int) $result;

            $month++;
        }

        return response()->json(['mailsThisYear'    => $mailsThisYear]);
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

    // search
    public function getDataUser(Request $request)
    {
        $user = User::with('credential')->where('name', 'like', "%$request->v%")->get();
        return response()->json(['data' => $user, 'token'   => $request->session()->token()]);
    }

    public function getDataOutgoingMails(Request $request)
    {
        $outgoingMails = OutgoingMail::where('mail_number', 'like', "%$request->v%")->get();
        return response()->json(['data' => $outgoingMails, 'token'  => $request->session()->token()]);
    }

    public function getDataIncomingMails(Request $request)
    {
        $incomingMails = IncomingMail::where('mail_number', 'like', "%$request->v%")->get();
        return response()->json(['data' => $incomingMails, 'token'  => $request->session()->token()]);
    }

    public function search(Request $request)
    {
        if ($request->t === 'users') return $this->getDataUser($request);
        if ($request->t === 'outgoing_mails') return $this->getDataOutgoingMails($request);
        if ($request->t === 'incoming_mails') return $this->getDataIncomingMails($request);

        return response()->json(['data' => null]);
    }
}

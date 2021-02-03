<?php

namespace App\Http\Controllers;

use App\APIs\SMS\Sms;
use App\Models\SmsLog;
use Illuminate\Http\Request;

/**
 * Class SmsController
 * @package App\Http\Controllers
 * @author amirnajdi amirnajdi@outlook.com
 */
class SmsController extends Controller
{
    /**
     * @param Request $request
     * @param $api
     * @param $number
     * @param $body
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendSms(Request $request, $api, $number, $body)
    {
        return Sms::sendSms($api, $number, $body);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function report()
    {
        $topTenNumbers = SmsLog::getTopTenNumbers();

        $apiCount = SmsLog::getApiCount();

        $smsCount = SmsLog::query()->count();

        $smsLogs = SmsLog::query()->orderBy('created_at', 'desc')->paginate(15);

        return view('report', compact('topTenNumbers', 'smsCount', 'smsLogs', 'apiCount'));
    }
}

<?php

namespace App\APIs\SMS;

use App\Models\SmsLog;

/**
 * Class Sms
 * @package App\APIs\SMS
 * @author amirnajdi amirnajdi@outlook.com
 */
class Sms
{

    /**
     * @param $api
     * @param $number
     * @param $body
     * @return \Illuminate\Http\JsonResponse
     */
    public static function sendSms($api, $number, $body)
    {
        $api = strtolower(trim($api));
        $apiType = SmsLog::API_UNKNOWN;
        $smsApi = null;
        if ($api == 'kavenegar') {
            $smsApi = new KavenegarAdapter();
            $apiType = SmsLog::API_KAVENEGAR;
        } else if ($api == 'ghasedak') {
            $smsApi = new GhasedakAdapter();
            $apiType = SmsLog::API_GHASEDAK;
        } else {
            SmsLog::newLog($apiType, SmsLog::STATUS_NOT_FOUND_API, $number, $body);
            return response()->json([
                'message' => 'api not found',
                'status' => 422
            ], 422);
        }

        $response = $smsApi->send($number, $body);
        SmsLog::newLog($apiType, $response['status'], $number, $body);
    }
}

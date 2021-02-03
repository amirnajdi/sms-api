<?php

namespace App\APIs\SMS;

use App\Models\SmsLog;

/**
 * Class KavenegarAdapter
 * @package App\APIs\SMS
 * @author amirnajdi amirnajdi@outlook.com
 */
class Kavenegar
{

    /**
     * @param $number
     * @param $body
     * @return null
     */
    public function send($number, $body)
    {
        logger('send sms: Kavenegar');
        return [
            'status' => SmsLog::STATUS[array_rand(SmsLog::STATUS)]
        ];
    }
}

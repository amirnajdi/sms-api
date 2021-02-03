<?php

namespace App\APIs\SMS;

use App\Models\SmsLog;

/**
 * Class Ghasedak
 * @package App\APIs\SMS
 * @author amirnajdi amirnajdi@outlook.com
 */
class Ghasedak
{

    /**
     * @param $number
     * @param $body
     * @return null
     */
    public function send($number, $body)
    {
        logger('send sms: Ghasedak');
        return [
            'status' => SmsLog::STATUS[array_rand(SmsLog::STATUS)]
        ];
    }
}

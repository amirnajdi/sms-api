<?php

namespace App\APIs\SMS;

use App\Interfaces\SmsAdapterInterface;

/**
 * Class GhasedakAdapter
 * @package App\APIs\SMS
 * @author amirnajdi amirnajdi@outlook.com
 */
class GhasedakAdapter implements SmsAdapterInterface
{
    private $ghasedak;

    /**
     * KavenegarAdapter constructor.
     * @param Kavenegar $kavenegar
     */
    public function __construct()
    {
        $this->ghasedak = new Ghasedak();
    }

    /**
     * @param $number
     * @param $body
     * @return null
     */
    public function send($number, $body)
    {
        return $this->ghasedak->send($number, $body);
    }
}

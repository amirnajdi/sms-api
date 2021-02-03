<?php

namespace App\APIs\SMS;

use App\Interfaces\SmsAdapterInterface;

/**
 * Class KavenegarAdapter
 * @package App\APIs\SMS
 * @author amirnajdi amirnajdi@outlook.com
 */
class KavenegarAdapter implements SmsAdapterInterface
{
    private $kavenegar;

    /**
     * KavenegarAdapter constructor.
     */
    public function __construct()
    {
        $this->kavenegar = new Kavenegar();
    }

    /**
     * @param $number
     * @param $body
     * @return null
     */
    public function send($number, $body)
    {
        return $this->kavenegar->send($number, $body);
    }
}

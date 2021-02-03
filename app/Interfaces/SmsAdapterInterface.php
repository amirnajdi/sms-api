<?php

namespace App\Interfaces;
/**
 * Interface SmsAdapter
 * @package App\Interface
 * @author amirnajdi amirnajdi@outlook.com
 */
interface SmsAdapterInterface
{

    /**
     * @param $number
     * @param $body
     * @return mixed
     */
    public function send($number, $body);
}

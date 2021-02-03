<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use phpDocumentor\Reflection\Types\Self_;

/**
 * Class SmsLog
 * @package App\Models
 * @author amirnajdi amirnajdi@outlook.com
 */
class SmsLog extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'body', 'status', 'api_type'];
    protected $appends = ['status_title', 'api_title'];
    const API_UNKNOWN = null;
    const API_KAVENEGAR = 1;
    const API_GHASEDAK = 2;
    const API_TYPES = [self::API_UNKNOWN, self::API_KAVENEGAR, self::API_GHASEDAK];

    const API_TITLE = [
        self::API_UNKNOWN => 'نامشخص',
        self::API_KAVENEGAR => 'کاونگار',
        self::API_GHASEDAK => 'قاصدک',
    ];

    const STATUS_NOT_FOUND_API = null;
    const STATUS_UNKNOWN = 0;
    const STATUS_IN_QUEUE = 1;
    const STATUS_FAILED = 6;
    const STATUS_DELIVERED = 10;
    const STATUS_UNDELIVERED = 11;
    const STATUS = [
        self::STATUS_UNKNOWN, self::STATUS_NOT_FOUND_API, self::STATUS_IN_QUEUE,
        self::STATUS_FAILED, self::STATUS_DELIVERED, self::STATUS_UNDELIVERED
    ];


    const STATUS_TITLE = [
        self::STATUS_UNKNOWN => 'نامشخص',
        self::STATUS_NOT_FOUND_API => 'api وارد شده اشتباه است',
        self::STATUS_FAILED => 'خطا در ارسال پیام که توسط سر شماره پیش می آید و به معنی عدم رسیدن پیامک می‌باشد.',
        self::STATUS_IN_QUEUE => 'در صف ارسال قرار دارد',
        self::STATUS_DELIVERED => 'رسیده به گیرنده',
        self::STATUS_UNDELIVERED => 'نرسیده به گیرنده ، این وضعیت به دلایلی از جمله خاموش یا خارج از دسترس بودن گیرنده اتفاق می افتد',
    ];

    const CACHE_TTL = 300; // 5 Minutes
    /**
     * @param $apiType
     * @param $status
     * @param $number
     * @param $body
     * @return \Illuminate\Http\JsonResponse
     */
    public static function newLog($apiType, $status, $number, $body)
    {
        if (!in_array($apiType, self::API_TYPES))
            $apiType = self::API_UNKNOWN;

        if (!in_array($status, self::STATUS))
            $status = self::STATUS_UNKNOWN;

        $log = new self([
            'number' => $number,
            'body' => $body,
            'api_type' => $apiType,
            'status' => $status
        ]);

        if ($log->save()) {
            return response()->json([
                'message' => 'sms sent successfully',
                'status' => 200
            ], 200);
        }
    }

    /**
     * @return string
     */
    public function getStatusTitleAttribute()
    {
        return self::STATUS_TITLE[$this->status];
    }

    /**
     * @return string
     */
    public function getApiTitleAttribute()
    {
        return self::API_TITLE[$this->api_type];
    }

    /**
     * @return mixed
     */
    public static function getTopTenNumbers()
    {
        return Cache::remember('smsLog.topTenNumbers', self::CACHE_TTL, function (){
           return self::query()
                ->selectRaw('number, count(*) as count')
                ->groupBy('number')
                ->orderBy('count', 'desc')
                ->limit(10)
                ->get();
        });
    }

    /**
     * @return mixed
     */
    public static function getApiCount()
    {
        return Cache::remember('smsLog.apiCount', self::CACHE_TTL, function (){
           return self::query()
                ->selectRaw('api_type, count(*) as count')
                ->groupBy('api_type')
                ->orderBy('count', 'desc')
                ->limit(3)
                ->get();
        });
    }
}

<?php

namespace Database\Factories;

use App\Models\SmsLog;
use Illuminate\Database\Eloquent\Factories\Factory;

class SmsLogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SmsLog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $apiType = SmsLog::API_TYPES[array_rand(SmsLog::API_TYPES)];
        $status = $apiType == null ? null : SmsLog::STATUS[array_rand(SmsLog::STATUS)];
        $apiType = $status == null ? null : $apiType;
        return [
            'number' => $this->faker->phoneNumber,
            'body' => $this->faker->realText(150),
            'status' => $status,
            'api_type' => $apiType
        ];
    }
}

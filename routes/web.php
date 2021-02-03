<?php

use App\Http\Controllers\SmsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[SmsController::class, 'report']);

Route::get('/sms/send/{api}/{number}/{body}', [SmsController::class, 'sendSms'])->name('send.sms');

Route::get('/sms/report', [SmsController::class, 'report'])->name('sms.report');


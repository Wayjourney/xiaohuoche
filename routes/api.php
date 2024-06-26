<?php

use App\Http\Controllers\IncomeController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

Route::get('wx/user', function(Request $request) {
    $code = $request->code;
    $response = Http::get('https://api.weixin.qq.com/sns/jscode2session?appid=' . env('APP_ID') . '&secret=' . env('APP_SECRET') . '&js_code=' . $code . '&grant_type=authorization_code');
    $json = $response->json();
    return $json;
});

// Route::get('wx/token', function (Request $request) {
//     $response = Http::get('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=' . env("APP_ID") . '&secret=' . env("APP_SECRET"));
//     $json = $response->json();
//     return $json;
// });

// Route::post('wx/getPhoneNumber', function (Request $request) {
//     $token = $request->input('token');
//     $code = $request->input('code');
//     $response = Http::post('https://api.weixin.qq.com/wxa/business/getuserphonenumber?access_token='.$token, ["code" => $code]);
//     $json = $response->json();
//     return $json;
// });

// Route::get('/users', [UserController::class, 'index']);
Route::get('users/search', [UserController::class, 'search']);
Route::post('users/decrease', [UserController::class, 'decrease']);
Route::get('/users/{openid}', [UserController::class, 'show']);

Route::get('prices', PriceController::class);

Route::get('incomes', [IncomeController::class, 'index']);
Route::post('incomes', [IncomeController::class, 'store']);

Route::get('receipts', [ReceiptController::class, 'index']);
Route::post('receipts/{receipt}/confirm', [ReceiptController::class, 'confirm']);

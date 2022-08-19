<?php

use Illuminate\Support\Facades\Route;
use Netgen\Extenduser\Components\Login;
use Netgen\Extenduser\Components\UserRegistration;



Route::group(['middleware' => 'RainLab\User\Classes\AuthMiddleware'], function () {

});
Route::get('/user-registration', [UserRegistration::class, 'onSave']);
Route::get('/user-otp-login', [Login::class, 'generateLoginOTP']);
Route::get('/user-login', [Login::class, 'customLogin']);



<?php

use Illuminate\Support\Facades\Route;
use Netgen\Extenduser\Components\Login;

Route::get('/user-otp-login', [Login::class, 'generateLoginOTP']);
Route::get('/otp-login', [Login::class, 'onSignin']);



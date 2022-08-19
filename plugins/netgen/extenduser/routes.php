<?php

use Illuminate\Support\Facades\Route;
use Netgen\Extenduser\Components\Login;
use Netgen\Extenduser\Components\Register;



Route::group(['middleware' => 'RainLab\User\Classes\AuthMiddleware'], function () {
    
});
Route::get('/register-user', [Register::class, 'userRegisteUser']);
Route::get('/user-login', [Login::class, 'customLogin']);



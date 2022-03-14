<?php

use Netgen\Examinations\Classes\DashboardController;
use Netgen\Examinations\Classes\ExaminationFormController;

Route::get('/examForm-list/{id}', [DashboardController::class,'index'])->name('all.forms');

Route::get('/getSchool', [ExaminationFormController::class,'school']);

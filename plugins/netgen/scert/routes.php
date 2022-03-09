<?php

use Netgen\Scert\Classes\AnnouncementController;
use Netgen\Scert\Classes\ScholarshipExaminationController;
use Netgen\Scert\Models\Announcement;



Route::get('/announcement-list', [AnnouncementController::class,'index'])->name('all.announcement');

Route::get('/announcement-examination-list/{category}', [ScholarshipExaminationController::class,'index']);


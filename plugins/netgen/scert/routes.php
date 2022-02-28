<?php

use Netgen\Scert\Classes\AnnouncementController;
use Netgen\Scert\Classes\ScholarshipExaminationController;
use Netgen\Scert\Models\Announcement;



Route::get('/announcement-list', [AnnouncementController::class,'index'])->name('all.announcement');

Route::get('/ntse-list/{category_id}', [ScholarshipExaminationController::class,'index'])->name('all.ntse');

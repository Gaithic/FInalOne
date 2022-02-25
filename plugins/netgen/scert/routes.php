<?php

use Netgen\Scert\Classes\AnnouncementController;
use Netgen\Scert\Classes\NtseController;
use Netgen\Scert\Models\Announcement;



Route::get('/announcement-list', [AnnouncementController::class,'index'])->name('all.announcement');

Route::get('/ntse-list', [NtseController::class,'index'])->name('all.ntse');

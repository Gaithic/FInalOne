<?php

use Netgen\Scert\Classes\AnnouncementController;
use Netgen\Scert\Models\Announcement;



Route::get('/announcement-list', [AnnouncementController::class,'index'])->name('all.announcement');


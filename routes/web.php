<?php

use App\Models\Announcement;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnouncementController;

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





Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/announcement/category/{category}', [HomeController::class, 'category'])->name('announcement.category');
Route::get('/about-us', [HomeController::class, 'aboutus'])->name('about.us');
Route::post('/about-us/send', [HomeController::class, 'send'])->name('about.send');
Route::post('/locale/{locale}', [HomeController::class, 'locale'])->name('locale');
Route::get('/search', [HomeController::class, 'search'])->name('search');


Route::middleware('auth')->group(function(){

    Route::get('/announcement/create', [AnnouncementController::class, 'create'])->name('announcement.create');
    Route::post('/announcement/store', [AnnouncementController::class, 'store'])->name('announcement.store');
    Route::post('/announcement/images/upload', [AnnouncementController::class, 'uploadImage'])->name('announcement.image');
    Route::delete('/announcement/images/remove', [AnnouncementController::class, 'removeImage'])->name('announcement.remove');
    Route::get('/announcement/images', [AnnouncementController::class, 'getImages'])->name('announcement.images');
    Route::get('/work-with-us', [ContactController::class, 'work'])->name('contact.work');
    Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
    Route::get('/announcements/autore/{autore}',[AnnouncementController::class,'autore'])->name('announcements.autore');
    Route::get('/announcement/edit/{id}', [AnnouncementController::class,'edit'])->name('announcement.edit');
    Route::put('/announcement/update/{id}', [AnnouncementController::class,'update'])->name('announcement.update');
    Route::delete('/announcement/delete/{id}', [AnnouncementController::class,'delete'])->name('announcement.delete');
    Route::delete('/image/delete/{id}', [AnnouncementController::class,'deleteImage'])->name('image.delete');

});

Route::middleware('is_admin')->group(function () {
    Route::get('/admin/panel', [AdminController::class, 'users'])->name('admin.panel');
    Route::post('/admin/panel/{id}/accept', [AdminController::class, 'addRevisor'])->name('admin.revisor.accept');
    Route::post('/admin/panel/{id}/delete', [AdminController::class, 'deleteRevisor'])->name('admin.revisor.delete');
    Route::get('/admin/autore',[AdminController::class,'autore'])->name('admin.autore');
    Route::get('/admin/{id}', [AdminController::class, 'show'])->name('admin.show');
    Route::get('/admin/edit/{id}', [AdminController::class,'edit'])->name('admin.edit');
    Route::delete('/admin/delete/user/{id}', [AdminController::class,'deleteUser'])->name('admin.deleteUser');
    Route::delete('/admin/delete/{id}', [AdminController::class,'delete'])->name('admin.delete');
});

Route::middleware('auth.revisor-admin')->group(function () {
    Route::get('/revisor/home', [RevisorController::class, 'home'])->name('revisor.home');
    Route::get('/revisor/detail/{id}', [RevisorController::class, 'detail'])->name('revisor.detail');
    Route::post('/revisor/announcement/{id}/accept', [RevisorController::class, 'accept'])->name('revisor.accept');
    Route::post('/revisor/announcement/{id}/reject', [RevisorController::class, 'reject'])->name('revisor.reject');
});

Route::get('/announcement/{id}', [AnnouncementController::class, 'show'])->name('announcement.show');
Route::get('/search', [HomeController::class, 'search'])->name('search');
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\RegistController;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SearchController;
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
// Route::get('/', function () {
//     return view('sample');
// });
Route::get('/', [TopController::class,'index']);
Route::get('/mypage', [MypageController::class,'index'])->name('mypage');
Route::get('/login', [LoginController::class,'login'])->name('login');
Route::post('/login', [LoginController::class,'postlogin']);
Route::get('/logout', [LoginController::class,'logout']);
Route::get('/account_info', [AccountController::class,'index']);
Route::get('/contact', [ContactController::class,'index']);
Route::get('/profile', [AccountController::class,'myprofile']);
Route::post('/profile/change', [AccountController::class,'profilechange']);
Route::prefix('regist')->group(function () {
    Route::get('/student',[FormController::class,'student']);
    Route::get('/teacher',[FormController::class,'teacher']);
    Route::post('/confirm', [FormController::class,'confirm']);
    Route::post('/complete', [FormController::class,'complete']);
});
Route::prefix('teachers')->group(function () {
    Route::get('/', [SearchController::class,'teachers']);
    Route::get('/profile/{id}', [AccountController::class,'profile']);
    Route::get('/profile/{id}/matching', [AccountController::class,'matching']);
});
Route::prefix('students')->group(function () {
    Route::get('/', [SearchController::class,'students']);
    Route::get('/profile/{id}', [AccountController::class,'profile']);
});
Route::get('/lesson', [LessonController::class,'index']);
Route::get('/message', [MessageController::class,'index']);
Route::get('/message_data', [MessageController::class,'index2']);
Route::get('/curriculum', [CurriculumController::class,'index']);
Route::get('/study_log_data', [StudyController::class,'index']);
Route::get('/test_results', [TestController::class,'index']);
Route::prefix('admin')->group(function () {
    Route::get('/', [LoginController::class,'adminlogin']);
    Route::post('/', [LoginController::class,'adminpostlogin'])->name('admin');
    Route::get('/mypage',[AdminController::class,'index']);
    Route::get('/students',[AdminController::class,'students']);
    Route::get('/teachers',[AdminController::class,'teachers']);
    Route::get('/users/delete/{id}',[AdminController::class,'user_delete']);
    Route::get('/users/edit/{id}',[AdminController::class,'user_edit']);
    Route::post('/users/confirm/{id}', [AdminController::class,'confirm']);
    Route::post('/users/complete', [AdminController::class,'complete']);
    Route::get('/subjects',[AdminController::class,'subjects']);
    Route::get('/subjects/regist',[AdminController::class,'regist']);
    Route::get('/subjects/delete/{id}',[AdminController::class,'subject_delete']);
    Route::get('/subjects/edit/{id}',[AdminController::class,'subject_edit']);
    Route::get('/subjects/complete',[AdminController::class,'subject_complete']);
    Route::get('/performances',[AdminController::class,'performances']);
    Route::get('/study_logs',[AdminController::class,'studylogs']);
});
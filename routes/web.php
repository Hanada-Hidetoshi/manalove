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
Route::get('/', [TopController::class,'index']);
// ログイン関係のルーティング
Route::get('/login', [LoginController::class,'login'])->name('login');
Route::post('/login', [LoginController::class,'postlogin']);
Route::get('/logout', [LoginController::class,'logout'])->name('logout');
Route::post('/logout', [LoginController::class,'postlogin']);
// マイページ関係のルーティング（表示のみ）
Route::get('/curriculum', [CurriculumController::class,'index']);
Route::get('/mypage', [MypageController::class,'index'])->name('mypage');
Route::get('/account_info', [AccountController::class,'index']);
Route::get('/contact', [ContactController::class,'index']);
// プロフィール関係のルーティング
Route::prefix('profile')->group(function () {
    Route::get('/', [AccountController::class,'myprofile']);
    Route::post('/change', [AccountController::class,'profilechange']);
});
// レッスン関係のルーティング
Route::prefix('lesson')->group(function () {
    Route::get('/', [LessonController::class,'index']);
    Route::post('/regist', [LessonController::class,'lessonregist']);
    Route::get('/delete/{id}', [LessonController::class,'lessondelete']);
    Route::get('/edit/{id}', [LessonController::class,'lessonedit']);
    Route::post('/complete/{id}', [LessonController::class,'lessoncomplete']);
    Route::get('/fix/{id}', [LessonController::class,'lessonfix']);
    Route::post('/confirm/{id}', [LessonController::class,'lessonconfirm']);
});
// 登録画面のルーティング
Route::prefix('regist')->group(function () {
    Route::get('/student',[FormController::class,'student']);
    Route::get('/teacher',[FormController::class,'teacher']);
    Route::post('/confirm', [FormController::class,'confirm']);
    Route::post('/complete', [FormController::class,'complete']);
});
// 各検索画面のルーティング
Route::prefix('teachers')->group(function () {
    Route::get('/', [SearchController::class,'teachers']);
    Route::get('/profile/{id}', [AccountController::class,'profile']);
});
Route::prefix('students')->group(function () {
    Route::get('/', [SearchController::class,'students']);
    Route::get('/profile/{id}', [AccountController::class,'profile']);
});
// マッチング関係のルーティング
Route::get('/matching/{id}', [MessageController::class,'matching']);
Route::get('/reject/{id}', [MessageController::class,'reject']);
Route::get('/waiting/{id}', [MessageController::class,'waiting']);
Route::get('/withdraw/{id}', [MessageController::class,'withdraw']);
Route::get('/matching_data', [MessageController::class,'index'])->name('matching');
// 学習ログ関係のルーティング
Route::prefix('study_logs')->group(function () {
    Route::get('/', [StudyController::class,'index']);
    Route::post('/regist', [StudyController::class,'logregist']);
    Route::get('/edit/{id}', [StudyController::class,'logedit']);
    Route::get('/delete/{id}', [StudyController::class,'logdelete']);
    Route::post('/complete/{id}', [StudyController::class,'logcomplete']);
});
// テスト関係のルーティング
Route::prefix('test_results')->group(function () {
    Route::get('/', [TestController::class,'index']);
});
// 管理者画面のルーティング
Route::prefix('admin')->group(function () {
    Route::get('/', [LoginController::class,'adminlogin']);
    Route::post('/', [LoginController::class,'adminpostlogin'])->name('admin');
    Route::get('/mypage',[AdminController::class,'index']);
    Route::get('/students',[AdminController::class,'students']);
    Route::get('/teachers',[AdminController::class,'teachers']);
    Route::get('/users/delete/{id}',[AdminController::class,'user_delete']);
    Route::get('/users/edit/{id}',[AdminController::class,'user_edit']);
    Route::post('/users/confirm/{id}', [AdminController::class,'confirm']);
    Route::post('/users/complete/{id}', [AdminController::class,'complete']);
    Route::get('/subjects',[AdminController::class,'subjects']);
    Route::get('/subjects/regist',[AdminController::class,'regist']);
    Route::get('/subjects/delete/{id}',[AdminController::class,'subject_delete']);
    Route::get('/subjects/edit/{id}',[AdminController::class,'subject_edit']);
    Route::get('/subjects/complete',[AdminController::class,'subject_complete']);
    Route::get('/performances',[AdminController::class,'performances']);
    Route::get('/study_logs',[AdminController::class,'studylogs']);
});
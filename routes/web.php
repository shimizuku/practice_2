<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// site top
Route::get('/', function () {
    return view('index');
})->name('top');

Route::get('/access', [App\Http\Controllers\AccessController::class, 'index'])->name('access');
Route::get('/stylist', [App\Http\Controllers\StylistController::class, 'index'])->name('stylist');
Route::get('/menu', [App\Http\Controllers\MenuController::class, 'index'])->name('menu');
Route::get('/opinion/input', [App\Http\Controllers\OpinionController::class, 'input'])->name('opinionInput');
Route::post('/opinion/input', [App\Http\Controllers\OpinionController::class, 'postInput'])->name('opinionPostInput');
Route::post('/opinion/confirm', [App\Http\Controllers\OpinionController::class, 'confirm'])->name('opinionConfirm');
Route::post('/opinion/result', [App\Http\Controllers\OpinionController::class, 'result'])->name('opinionResult');

// admin
Route::get('/admin',[App\Http\Controllers\HomeController::class, 'index'])->name('admin');
Route::get('/admin/login',[App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login',[App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/admin/logout',[App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/admin/password/reset',[App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('passRequest');
Route::post('/admin/password/email',[App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('passEmail');
Route::get('/admin/password/reset/{token}',[App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('passReset');
Route::post('/admin/password/reset',[App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('passUpdate');

Route::get('/admin/menu/list', [App\Http\Controllers\Admin\MenuController::class, 'list'])->name('menuList')->middleware('auth');
Route::get('/admin/menu/create/input', [App\Http\Controllers\Admin\MenuController::class, 'inputCreate'])->name('createInputMenu')->middleware('auth');
Route::post('/admin/menu/create/input', [App\Http\Controllers\Admin\MenuController::class, 'postInput'])->name('createPostInputMenu')->middleware('auth');
Route::post('/admin/menu/create/confirm', [App\Http\Controllers\Admin\MenuController::class, 'confirm'])->name('createConfirmMenu')->middleware('auth');
Route::post('/admin/menu/create/result', [App\Http\Controllers\Admin\MenuController::class, 'result'])->name('createResultMenu')->middleware('auth');
Route::get('/admin/menu/edit/input/{id}', [App\Http\Controllers\Admin\MenuController::class, 'inputEdit'])->name('editInputMenu')->middleware('auth');
Route::post('/admin/menu/edit/input/{id}', [App\Http\Controllers\Admin\MenuController::class, 'postInput'])->name('editPostInputMenu')->middleware('auth');
Route::post('/admin/menu/edit/confirm/{id}', [App\Http\Controllers\Admin\MenuController::class, 'confirm'])->name('editConfirmMenu')->middleware('auth');
Route::post('/admin/menu/edit/result/{id}', [App\Http\Controllers\Admin\MenuController::class, 'result'])->name('editResultMenu')->middleware('auth');

Route::get('/admin/earnings/list', [App\Http\Controllers\Admin\EarningsController::class, 'list'])->name('earningsList')->middleware('auth');
Route::post('/admin/earnings/list', [App\Http\Controllers\Admin\EarningsController::class, 'postList'])->name('anotherDayEarningsList')->middleware('auth');
Route::get('/admin/earnings/input/{type}/{id?}', [App\Http\Controllers\Admin\EarningsController::class, 'input'])->name('inputEarnings')->middleware('auth');
Route::post('/admin/earnings/input/{type}/{id?}', [App\Http\Controllers\Admin\EarningsController::class, 'postInput'])->name('returnInputEarnings')->middleware('auth');
Route::post('/admin/earnings/confirm/{type}/{id?}', [App\Http\Controllers\Admin\EarningsController::class, 'confirm'])->name('confirmEarnings')->middleware('auth');
Route::post('/admin/earnings/result/{type}/{id?}', [App\Http\Controllers\Admin\EarningsController::class, 'result'])->name('resultEarnings')->middleware('auth');

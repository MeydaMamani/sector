<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\main\DashboardController;
use App\Http\Controllers\main\MainController;
use App\Http\Controllers\fed\KidsController;
use App\Http\Controllers\juntos\jKidsController;
use App\Http\Controllers\meta4\mKidsController;

// Route::get('/', function () { return view('index'); });
Route::get('/', [LoginController::class, 'index']) ->name('login');
Route::post('/', [LoginController::class, 'loginAuth']) ->name('login.loginAuth');
Route::post('/logout', [LoginController::class, 'logout']) ->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::post('provinces/', [MainController::class, 'province']);
Route::post('districts/', [MainController::class, 'district']);
Route::post('pn/', [MainController::class, 'datePadronNominal']);

Route::get('/premature', [KidsController::class, 'index']);
Route::post('/premature/list', [KidsController::class, 'listPremature']);
Route::get('/premature/print', [KidsController::class, 'printPremature']);

Route::get('/juntkids', [jKidsController::class, 'indexKids']);
Route::get('/juntkids/print', [jKidsController::class, 'printKids']);
Route::post('/juntkids/list', [jKidsController::class, 'totalData']);
Route::post('/juntkids/grafCred', [jKidsController::class, 'forGrafCred']);
Route::post('/juntkids/tableResumCred', [jKidsController::class, 'tableResumCreds']);
Route::get('/juntkids/printRn', [jKidsController::class, 'printRn']);
Route::get('/juntkids/printCredMes', [jKidsController::class, 'printCredMes']);

Route::get('/met4kids', [mKidsController::class, 'indexKids']);
// Route::get('/met4kids/print', [jKidsController::class, 'printKids']);
Route::post('/met4kids/list', [mKidsController::class, 'totalData']);

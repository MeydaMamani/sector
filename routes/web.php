<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\main\DashboardController;
use App\Http\Controllers\main\MainController;
use App\Http\Controllers\fed\KidsController;
use App\Http\Controllers\juntos\jKidsController;
use App\Http\Controllers\juntos\jPregnantsController;
use App\Http\Controllers\meta4\mKidsController;
use App\Http\Controllers\cuna\SafController;
use App\Http\Controllers\cuna\ScdController;

use App\Http\Controllers\PaqueteController;

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
Route::get('/juntkids/printCred12', [jKidsController::class, 'printCred12']);
Route::get('/juntkids/printPaquete', [jKidsController::class, 'printPaquete']);

Route::post('/juntkids/grafSuple', [jKidsController::class, 'forGrafSuple']);
Route::post('/juntkids/tableResumSuple', [jKidsController::class, 'tableResumSuple']);
Route::get('/juntkids/printSuple5', [jKidsController::class, 'printSuple5']);
Route::get('/juntkids/printSuple611', [jKidsController::class, 'printSuple6_11']);
Route::get('/juntkids/printSuple12', [jKidsController::class, 'printSuple1_2']);

Route::post('/juntkids/grafVaccine', [jKidsController::class, 'forGrafVaccine']);
Route::post('/juntkids/tableResumVaccine', [jKidsController::class, 'tableResumVaccine']);
Route::get('/juntkids/printVaccine2M', [jKidsController::class, 'printVaccine2M']);
Route::get('/juntkids/printVaccine4M', [jKidsController::class, 'printVaccine4M']);
Route::get('/juntkids/printVaccine6M', [jKidsController::class, 'printVaccine6M']);

Route::get('/juntpregnants', [jPregnantsController::class, 'indexPregnants']);
Route::get('/juntpregnants/print', [jPregnantsController::class, 'printPregnants']);
Route::post('/juntpregnants/list', [jPregnantsController::class, 'totalData']);
Route::post('/juntpregnants/grafEA', [jPregnantsController::class, 'forGrafEA']);



Route::get('/met4kids', [mKidsController::class, 'indexKids']);
Route::get('/met4kids/print', [mKidsController::class, 'printKids']);
Route::post('/met4kids/list', [mKidsController::class, 'totalData']);
Route::post('/met4kids/grafCred', [mKidsController::class, 'forGrafCred']);
Route::post('/met4kids/tableResumCred', [mKidsController::class, 'tableResumCreds']);
Route::get('/met4kids/printRn', [mKidsController::class, 'printRn']);
Route::get('/met4kids/printCredMes', [mKidsController::class, 'printCredMes']);
Route::get('/met4kids/printCred12', [mKidsController::class, 'printCred12']);

Route::post('/met4kids/grafSuple', [mKidsController::class, 'forGrafSuple']);
Route::post('/met4kids/tableResumSuple', [mKidsController::class, 'tableResumSuples']);
Route::get('/met4kids/printSuple45', [mKidsController::class, 'printSuple45']);
Route::get('/met4kids/printSuple611', [mKidsController::class, 'printSuple611']);
Route::get('/met4kids/printSuple12', [mKidsController::class, 'printSuple12']);

Route::post('/met4kids/grafVaccine', [mKidsController::class, 'forGrafVaccine']);
Route::post('/met4kids/tableResumVac', [mKidsController::class, 'tableResumVac']);
Route::get('/met4kids/printVac12', [mKidsController::class, 'printVac12']);
Route::get('/met4kids/printVac4', [mKidsController::class, 'printVac4']);
Route::get('/met4kids/printVac6', [mKidsController::class, 'printVac6']);

Route::post('/met4kids/grafTmz', [mKidsController::class, 'forGrafTmz']);
Route::post('/met4kids/tableResumTmz', [mKidsController::class, 'tableResumTmz']);
Route::get('/met4kids/printTmz6M', [mKidsController::class, 'printTmz6M']);
Route::get('/met4kids/printTmz12M', [mKidsController::class, 'printTmz12M']);
Route::get('/met4kids/printTmz18M', [mKidsController::class, 'printTmz18M']);

Route::post('/met4kids/grafAgeMonth', [mKidsController::class, 'forGrafAgeMonth']);
Route::post('/met4kids/tableResumPackKids', [mKidsController::class, 'tableResumPackKids']);
Route::get('/met4kids/printPack611', [mKidsController::class, 'printPack611']);
Route::get('/met4kids/printDx611', [mKidsController::class, 'printDx611']);
Route::get('/met4kids/printPack45', [mKidsController::class, 'printPack45']);

Route::get('/cunaSaf', [SafController::class, 'indexSaf']);
Route::get('/cunaSaf/print', [SafController::class, 'printNominal']);

Route::get('/cunaScd', [ScdController::class, 'indexScd']);
Route::get('/cunaScd/print', [ScdController::class, 'printNominal']);

Route::get('/patients', [PaqueteController::class, 'index']);
Route::post('/patients/kids', [PaqueteController::class, 'searchKids']);
Route::post('/patients/pregnant', [PaqueteController::class, 'searchPregnant']);
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\MainController;

use App\Mail\EmailFed;
use Illuminate\Support\Facades\Mail;


Route::get('/send', [EmailFed::class, 'index']);
Route::get('/send/enviar', [EmailFed::class, 'sendMail']);

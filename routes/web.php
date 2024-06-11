<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AccountController::class, 'login']);

//doLoginのルーティング追加
Route::post('accounts/doLogin', [AccountController::class, 'doLogin']);

//doLogoutのルーティング追加
Route::post('accounts/doLout', [AccountController::class, 'doLogout']);

Route::get('accounts/index/{account_id?}', [AccountController::class, 'index']);

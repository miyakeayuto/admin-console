<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AccountController::class, 'login']);

//doLoginのルーティング追加
Route::post('accounts/doLogin', [AccountController::class, 'doLogin']);

//doLogoutのルーティング追加
Route::post('accounts/doLogout', [AccountController::class, 'doLogout']);

//playerのルーティング追加
Route::get('accounts/player', [AccountController::class, 'playerList']);

//itemのルーティング追加
Route::get('accounts/item', [AccountController::class, 'itemList']);

//have_itemのルーティング追加
Route::get('accounts/have_item', [AccountController::class, 'have_ItemList']);

Route::get('accounts/index/{account_id?}', [AccountController::class, 'index']);

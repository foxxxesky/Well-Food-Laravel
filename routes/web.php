<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [Controller::class, 'main']);
Route::get('/highprotein', [Controller::class, 'fetch_highprotein']);
Route::get('/lowcarb', [Controller::class, 'fetch_lowcarb']);
Route::get('/lowfat', [Controller::class, 'fetch_lowfat']);
Route::get('/lowsodium', [Controller::class, 'fetch_lowsodium']);
Route::get('/lowsugar', [Controller::class, 'fetch_lowsugar']);
Route::get('/vegetarian', [Controller::class, 'fetch_vegetarian']);
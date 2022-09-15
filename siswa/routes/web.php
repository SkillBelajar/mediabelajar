<?php

use App\Http\Controllers\awal;
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


Route::get('/', function () {
    return view('welcome');
});

 Route::get('/admin', [loginx::class, 'admin']);

*/

Route::get('/', [awal::class, 'awal']);
Route::post('/', [awal::class, 'simpanpeserta']);


Route::get('/mediabelajar', [awal::class, 'mediabelajar']);
Route::post('/simpanessai', [awal::class, 'simpanessai']);
Route::post('/simpanabc', [awal::class, 'simpanabc']);


Route::get('/gambar', [awal::class, 'gambar']);
Route::get('/nilai', [awal::class, 'nilai']);
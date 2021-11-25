<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {

    // $users = DB::table('tb_produtoestoque')
    // ->select('nr_quantidade')
    // ->where('cd_produto','6811')
    // ->where('cd_empresa','1')

    // ->where('dep','20')

    // ->get();

    // dd($users);
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('product', 'ProductController');
Route::resource('request', 'RequestController');

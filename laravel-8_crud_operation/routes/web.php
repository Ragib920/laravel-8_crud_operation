<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\crudController;


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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/',[crudController::class,'showData']);
Route::get('/store',[crudController::class,'addData']);
Route::Post('/storeData',[crudController::class,'storeData']);
Route::get('/editData/{id}',[crudController::class,'editData']);
Route::Post('/updateData/{id}',[crudController::class,'updateData']);
Route::get('/deleteData/{id}',[crudController::class,'deleteData']);

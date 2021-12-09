<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectTypeController;


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
    return view('pages.home.index');
});

Route::get('/login', function () {
    return view('pages.home.login');
})->middleware('logged.in');

Route::get('/registration', function () {
    return view('pages.home.registration');
});


Route::get('/{section}/{page}', function ($section, $page) {
    return view("pages.$section.$page",[ 'page' => $page ]);
})->middleware('logged.in');

//Route::post('/app/{controller}/{class}',[ucfirst()]);

Route::get('/app/user/logout',[UserController::class, 'logout']);
Route::post('/app/user/login',[UserController::class, 'login']);


Route::post('/app/user/edit',[UserController::class, 'edit']);
Route::post('/app/user/store',[UserController::class, 'store']);
Route::post('/app/user/update',[UserController::class, 'update']);
Route::post('/app/user/destroy',[UserController::class, 'destroy']);

Route::post('/app/project/create',[ProjectController::class, 'create']);
Route::post('/app/project/edit',[ProjectController::class, 'edit']);
Route::post('/app/project/store',[ProjectController::class, 'store']);
Route::post('/app/project/update',[ProjectController::class, 'update']);
Route::post('/app/project/destroy',[ProjectController::class, 'destroy']);

Route::post('/app/projecttype/store',[ProjectTypeController::class, 'store']);
Route::post('/app/projecttype/update',[ProjectTypeController::class, 'update']);
Route::post('/app/projecttype/destroy',[ProjectTypeController::class, 'destroy']);

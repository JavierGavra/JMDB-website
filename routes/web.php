<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\dashboard\DashboardFilmController;
use App\Http\Controllers\dashboard\DashboardStudioController;
use App\Models\Film;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home.home');
});

Route::group(["prefix" => "/film"], function (){
    Route::get('/all', [FilmController::class, 'index']);
    Route::get('/detail/{film}', [FilmController::class, 'show']);
});

Route::group(["prefix" => "/studio"], function (){
    Route::get('/all', [StudioController::class, 'index']);
    Route::get('/detail/{studio}', [StudioController::class, 'show']);
});

Route::get('/about', function () {
    return view('about.about');
});

Route::group(["prefix" => "/login"], function (){
    Route::get('/', [LoginController::class, 'index']);
    Route::post('/auth', [LoginController::class, 'auth']);
    Route::post('/logout', [LoginController::class, 'logout']);
});

Route::group(["prefix" => "/register"], function (){
    Route::get('/', [RegisterController::class, 'index']);
    Route::post('/create', [RegisterController::class, 'create']);
});

Route::group(["prefix"=>"/dashboard"], function() {
    Route::get('/', function () {
        return view('dashboard.index');
    })->middleware('auth');

    Route::group(["prefix"=>"/film"], function() {
        Route::get('/all', [DashboardFilmController::class, 'index'])->middleware('auth');
        Route::get('/detail/{film}', [DashboardFilmController::class, 'show'])->middleware('auth');
        Route::get('/create', [DashboardFilmController::class, 'create'])->middleware('auth');
        Route::post('/add', [DashboardFilmController::class, 'store'])->middleware('auth');
        Route::get('/edit/{film}', [DashboardFilmController::class, 'edit'])->middleware('auth');
        Route::post('/update/{film}', [DashboardFilmController::class, 'update'])->middleware('auth');
        Route::delete('/delete/{film}', [DashboardFilmController::class, 'destroy'])->middleware('auth');
    });

    Route::group(["prefix"=>"/studio"], function() {
        Route::get('/all', [DashboardStudioController::class, 'index'])->middleware('auth');
        Route::get('/detail/{studio}', [DashboardStudioController::class, 'show'])->middleware('auth');
        Route::get('/edit/{studio}', [DashboardStudioController::class, 'edit'])->middleware('auth');
        Route::post('/update/{studio}', [DashboardStudioController::class, 'update'])->middleware('auth');
    });
});
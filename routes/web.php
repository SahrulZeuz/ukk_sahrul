<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\KomentarController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GuestController::class, 'index'])->name('guest');


Route::middleware(['guest'])->group(function() {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/post/login', [AuthController::class, 'auth'])->name('login.post');

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register/post', [AuthController::class, 'registerpost'])->name('register.post');
});


Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', [DashbordController::class, 'index'])->name('dashboard');
    Route::get('/album/sort/{id}', [DashbordController::class, 'sort'])->name('album.sort');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/album', [AlbumController::class,'index'])->name('album');
    Route::post('/album/post', [AlbumController::class,'store'])->name('album.store');

    Route::get('/foto', [FotoController::class, 'index'])->name('foto');
    Route::delete('/foto/{id}', [FotoController::class, 'delete'])->name('foto.delete');
    Route::post('/foto/post', [FotoController::class, 'store'])->name('foto.store');

    Route::post('/like/{id}', [FotoController::class, 'like'])->name('like');

    Route::get('/komentar/{id}', [KomentarController::class, 'index'])->name('komentar');
    Route::post('/komentar/{id}', [KomentarController::class, 'store'])->name('komentar.store');
});

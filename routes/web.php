<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ForumPostController;
use App\Http\Controllers\FichierController;
use App\Http\Controllers\LocalizationController;                       

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


/* -Routes d'Authentification- */
    Route::get('login', [UserController::class, 'index'])->name('login');
    Route::post('login', [UserController::class, 'authentication'])->name('user.auth');
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
    
/* -Route la page d'accueil- */
    Route::get('/', function () {return view('accueil');});
    Route::post('/', [UserController::class, 'authentication'])->name('user.auth');

/* -Route utilisateur- */
    Route::get('dashboard', function () {return view('dashboard');})->name('dashboard')->middleware('auth');
    
/* -Routes du forum- */
    Route::get('forum',[ForumPostController::class, 'index'])->name('forum.index')->middleware('auth');
    Route::get('forum/{forumPost}', [ForumPostController::class, 'show'])->name('forum.show')->middleware('auth');
    Route::get('post-modification/{forumPost}', [ForumPostController::class, 'edit'])->name('forum.edit')->middleware('auth');
    Route::put('post-modification/{forumPost}', [ForumPostController::class, 'update'])->middleware('auth');
    Route::get('post-create' ,[ForumPostController::class,'create'])->name('forum.create')->middleware('auth');
    Route::post('post-create',[ForumPostController::class,'store'])->name('forum.store')->middleware('auth');
    Route::delete('forum/{forumPost}', [ForumPostController::class, 'destroy'])->middleware('auth');

/* -Routes du répertoire de documents- */
    Route::get('depot', [FichierController::class, 'index'])->name('depot.index')->middleware('auth');
    Route::get('file/{fileId}', [FichierController::class, 'index'])->name('file.detaile')->middleware('auth');
    Route::get('file-upload' ,[FichierController::class,'create'])->name('file.ajoute')->middleware('auth');
    Route::post('file-upload',[FichierController::class,'store'])->name('file.store')->middleware('auth');

/* -Routes du langage- */
    Route::get('/lang/{locale}', [LocalizationController::class, 'index'])->name('lang');

/* -pagination- */
    Route::get('page', [BlogPostController::class, 'page']);
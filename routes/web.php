<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\jawabanController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\exportController;
use App\Http\Controllers\tampilController;
use App\Http\Controllers\ForumController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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
// Test PDF Wrapper
// Route::get('/test_domPDF', function(){
//     $pdf = App::make('dompdf.wrapper');
//     $pdf->loadHTML('<h1>Test</h1>');
//     return $pdf->stream();
// });

// untuk user
// Route::middleware(['auth', 'role:users'])->group(function(){
//     Route::get('/', [tampilController::class, 'index']);
//     Route::get('/forum/create', [ForumController::class, 'create']);
// });


// Route::get('/', [AuthController::class, 'home']);
// Login dan autentikasi
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/postregister', [AuthController::class, 'postregister']);
Route::get('/logout', [AuthController::class, 'logout']);


//middleware untuk role admin
Route::middleware(['web','auth', 'role:admin'])->group(function () {
    // table pertanyaan
    Route::resource('pertanyaan', PertanyaanController::class)->except('show');
    Route::resource('jawaban', jawabanController::class)->except('show');
    Route::resource('kategori', TagController::class)->except('show');

    // Export pdf pertanyaan & jawban
    Route::get('/exportPertanyaan', [exportController::class, 'PDFPertanyaan']);
    Route::get('/ExcelPertanyaan', [exportController::class, 'ExcelPertanyaan']);

    Route::get('/exportJawaban', [exportController::class, 'PDFJawaban']);
    Route::get('/ExcelJawaban', [exportController::class, 'ExcelJawaban']);
});

//middleware untuk role user/admin
Route::middleware(['auth', 'role:user,admin','web'])->group(function () {
    Route::get('/', [profileController::class, 'index']);
    Route::get('/', [tampilController::class, 'index']);
    Route::get('/view_kategori/{id}', [tampilController::class, 'view_kategori']);
    Route::get('/kategori/{id}', [tampilController::class, 'kategori']);
    Route::get('/kategori_pertanyaan/{id}', [tampilController::class, 'kategori_pertanyaan']);
    Route::get('/forum/create', [ForumController::class, 'create']);
    Route::get('/forum/show/{id}', [ForumController::class, 'show']);
    Route::post('/forum/store', [ForumController::class, 'store']);
    Route::post('/forum/jawaban/{id}', [ForumController::class, 'jawab']);
    Route::get('/forum/edit/{id}', [ForumController::class, 'edit']); // edit
    Route::get('/forum/edit2/{id}', [ForumController::class, 'edit2']);
    Route::post('/forum/update/{id}', [ForumController::class, 'update']); // update
    Route::patch('/forum/update/{id}', [ForumController::class, 'update2']);
    Route::post('/forum/hapus/{id}', [ForumController::class, 'destroy']); // delete
    Route::delete('/forum/hapus/{id}', [ForumController::class, 'destroy2']);
    Route::resource('profile', profileController::class);
    Route::get('/pertanyaan/{show}', [profileController::class, 'ShowPertanyaan']); // show admin untuk pertanyaan user
    Route::get('/jawaban/{show}', [profileController::class, 'ShowJawaban']); // show admin untuk jawaban user
});




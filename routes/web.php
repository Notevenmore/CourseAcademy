<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Home;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LanggananController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PengajuanMentor;
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
// route halaman utama
Route::get('/', [Home::class, 'index'])->name('home');
Route::resource('lainnya', PengajuanMentor::class)->middleware('auth');

// set route autentikasi
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authorization'])->name('authorize')->middleware('guest');
Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'store_data_register'])->name('authenticate')->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// set route learning path
Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan');
Route::get('/jurusan/{jurusan}/course', [JurusanController::class, 'show'])->name('course');
Route::get('/jurusan/{jurusan}/course/{course}', [CourseController::class, 'show'])->name('course-class');

// set route langganan
Route::resource('langganan', LanggananController::class)->middleware('auth');

//set route admin
Route::resource('admin', AdminController::class)->middleware(['auth', 'isAdmin']);
Route::get('/data-pembelian', [AdminController::class, 'showPurchaseData'])->name('purchase-data')->middleware(['auth', 'isAdmin']);
Route::get('/data-course', [AdminController::class, 'showCourseData'])->name('course-data')->middleware(['auth', 'isAdmin']);
Route::resource('course', CourseController::class)->middleware(['auth', 'isAdmin']);
Route::resource('materi', MaterialController::class)->middleware(['auth', 'isAdmin']);
Route::resource('pembelian', PembelianController::class)->middleware(['auth']);
Route::resource('userdata', UserController::class)->middleware(['auth', 'isAdmin']);

//set route mentor
Route::resource('mentor', MentorController::class)->middleware(['auth', 'isMentor']);
Route::resource('material', MaterialController::class)->middleware(['auth', 'isMentor']);
Route::get('/add-material/{course}', [MaterialController::class, 'spesificForm'])->name('add-material')->middleware(['auth', 'isMentor']);

//set route student
Route::get('/learn/{course}/materi/{materi}', [MaterialController::class, 'learn'])->name('learn')->middleware('auth');
Route::resource('review', ReviewController::class)->middleware('auth');
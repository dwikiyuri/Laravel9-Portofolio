<?php

use App\Models\project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\authController;
use App\Http\Controllers\skillContoller;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\halamanController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\projectController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\educationController;
use App\Http\Controllers\experienceController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\settinghalamanController;
use App\Models\category;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [homeController::class, "index"])->name('home');
Route::post('/sendMail', [homeController::class, "sendMail"])->name('home.sendMail');
Route::redirect('home', 'dashboard');

Route::get('/auth', [authController::class, "index"])->name('login')->middleware('guest');
Route::get('/auth/redirect', [authController::class, "redirect"])->middleware('guest');

Route::get('/auth/callback', [authController::class, "callback"])->middleware('guest');
Route::get('/auth/logout', [authController::class, "logout"]);
// Route::get('/dashboard', function (){

// });
Route::prefix('dashboard')->middleware('auth')->group(
    function (){
          // Rute untuk halaman utama dashboard
    Route::get('/', [dashboardController::class, 'index'])->name('dashboard');

    // Rute untuk halaman 'halaman' di dalam dashboard
    Route::get('/halaman', [halamanController::class, 'index'])->name('dashboard.halaman');
    // Rute halaman 'skill'
    Route::get('skill',[skillContoller::class, "index"])->name('skill.index');
    Route::post('skill',[skillContoller::class, "update"])->name('skill.update');
    // Rute halaman profile
    Route::get('profile',[profileController::class, "index"])->name('profile.index');
    Route::post('profile',[profileController::class, "update"])->name('profile.update');
    Route::get('profile/cv', [profileController::class, 'showCV'])->name('profile.cv');
    // Rute pengaturan halaman
    Route::get('setting',[settinghalamanController::class, "index"])->name('setting.index');
    Route::post('setting',[settinghalamanController::class, "update"])->name('setting.update');
    // Rute pengaturan halaman
    Route::get('contact',[contactController::class, "index"])->name('contact.index');
    Route::post('contact/sendMail',[contactController::class, "sendMail"])->name('contact.sendMail');
    // Rute resource untuk halaman
    Route::resource('halaman', halamanController::class);
    Route::resource('experience', experienceController::class);
    Route::resource('education', educationController::class);
    Route::resource('project', projectController::class);
    Route::resource('category', categoryController::class);


    }
);

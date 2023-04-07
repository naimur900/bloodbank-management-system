<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ConsumerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [HomeController::class, 'home'])->name('home');

Auth::routes();

//==================================== Hospital=======================================//
Route::prefix('hospital/')->name('hospital.')->middleware(['auth', 'hospital'])->group(function () {

    Route::get('/', [HospitalController::class, 'Dashboard'])->name('dashboard');
    Route::get('/available-blood', [HospitalController::class, 'showAvailableBlood'])->name('availableBlood');
    Route::get('/blood-requests', [HospitalController::class, 'showBloodRequests'])
        ->name('requests');
    Route::post('/add-blood', [HospitalController::class, 'AddBlood'])
        ->name('addBlood');
    Route::post('/handle-blood-request', [HospitalController::class, 'handleBloodRequests'])
        ->name('handleRequests');

    Route::post('/profile/update', [ProfileController::class, 'updateHospital'])->name('profile.update');
    Route::get('/profile', [ProfileController::class, 'showHospital'])->name('profile.show');
});
//========================================Authenticated Consumer =======================================//
Route::prefix('consumer/')->name('consumer.')->middleware(['auth'])->group(function () {

    Route::post('/profile/update', [ProfileController::class, 'updateConsumer'])->name('profile.update');
    Route::get('/profile', [ProfileController::class, 'showConsumer'])->name('profile.show');
    Route::post('/send-request/{hospital}', [ConsumerController::class, 'sendRequest'])->name('sendRequest');
});
//=====================================Unauthenticated Consumers============================//
Route::get('/consumer/hospitals', [ConsumerController::class, 'hospitalIndex'])
    ->name('consumer.hospitals');
Route::get('/consumer/hospital/{hospital}', [ConsumerController::class, 'showHospital'])
    ->name('consumer.showHospital');

//================================Login <==&==> Registration=========================//

Route::view('/login', 'login')->name('login');
Route::get('/register', function () {
    return view('register');
})
    ->name('register');
Route::get('/register/{type}', [RegisterController::class, 'showRegistrationForm'])
    ->where('type', 'hospital|consumer')
    ->name('register.form');
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/login/{type}', [LoginController::class, 'showLoginForm'])
    ->where('type', 'hospital|consumer')
    ->name('login.form');

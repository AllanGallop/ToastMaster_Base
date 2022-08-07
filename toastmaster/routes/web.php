<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileEventsController;
use App\Http\Controllers\AdminController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


# User Profile
Route::get('/profile', [ProfileController::class, 'view'])->middleware(['auth'])->name('profile');
Route::post('/profile', [ProfileController::class, 'store'])->middleware(['auth']);
Route::post('/profile/password', [ProfileController::class, 'update_password'])->middleware(['auth']);

# User Profile Events
Route::get('profile/events', [ProfileEventsController::class, 'view'])->middleware(['auth'])->name('profile/events');
Route::get('profile/events/location/{id}', [ProfileEventsController::class, 'location'])->middleware(['auth']);
Route::post('profile/events/volunteer', [ProfileEventsController::class, 'volunteer'])->middleware(['auth']);

# Admin Profile
Route::get('admin/users', [AdminController::class, 'users'])->middleware(['auth','admin'])->name('admin/users');
Route::post('admin/users/delete', [AdminController::class, 'delete'])->middleware(['auth','admin']);

# Admin Events
Route::get('admin/events/add', [AdminController::class, 'viewAddEvent'])->middleware(['auth','admin'])->name('admin/events/add');
Route::post('admin/events/add', [AdminController::class, 'AddEvent'])->middleware(['auth','admin']);
Route::get('admin/events/edit/{id}', [AdminController::class, 'viewEditEvent'])->middleware(['auth','admin'])->name('admin/events/edit');
Route::post('admin/events/edit', [AdminController::class, 'updateEvent'])->middleware(['auth','admin']);

require __DIR__.'/auth.php';

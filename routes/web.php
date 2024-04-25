<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// {{ Home Controllers }}}}
Route::get('/', [AdminController::class, 'home']);

Route::get('/about', [HomeController::class, 'about']);

Route::get('/rooms', [HomeController::class, 'rooms']);

Route::get('/gallery', [HomeController::class, 'gallery']);

Route::get('/blog', [HomeController::class, 'blog']);

Route::post('/contact', [HomeController::class, 'contact']);

Route::get('/contact-us', [HomeController::class, 'contact1']);

Route::get('/room_details/{id}', [HomeController::class, 'detailRoom']);

Route::post('/add-booking/{id}', [HomeController::class, 'addBooking']);


// {{ Admin Controllers }}

Route::get('/home', [AdminController::class, 'index'])->name('home');


Route::get('/create-room', [AdminController::class, 'createRoom'])->middleware(['auth', 'admin']);
Route::get('/view-room', [AdminController::class, 'viewRoom'])->name('viewRoom')->middleware(['auth', 'admin']);

Route::post('/add-room', [AdminController::class, 'addRoom'])->middleware(['auth', 'admin']);

Route::get('/delete-room/{id}', [AdminController::class, 'deleteRoom'])->middleware(['auth', 'admin']);
Route::get('/edit-room/{id}', [AdminController::class, 'editRoom'])->middleware(['auth', 'admin']);
Route::post('/update-room/{id}', [AdminController::class, 'updateRoom'])->middleware(['auth', 'admin']);

Route::get('/bookings', [AdminController::class, 'bookings'])->middleware(['auth', 'admin']);

Route::get('/delete-booking/{id}', [AdminController::class, 'deleteBooking'])->middleware(['auth', 'admin']);

Route::get('/approve-booking/{id}', [AdminController::class, 'approveBooking'])->middleware(['auth', 'admin']);

Route::get('/reject-booking/{id}', [AdminController::class, 'rejectBooking'])->middleware(['auth', 'admin']);

Route::get('/view-gallery', [AdminController::class, 'viewGallery'])->middleware(['auth', 'admin']);

Route::post('/upload-img', [AdminController::class, 'uploadImg'])->middleware(['auth', 'admin']);

Route::get('/delete-img/{id}', [AdminController::class, 'deleteImg'])->middleware(['auth', 'admin']);


Route::get('/view-messages', [AdminController::class, 'viewMessages'])->middleware(['auth', 'admin']);


Route::get('/send-mail/{id}', [AdminController::class, 'sendMail'])->middleware(['auth', 'admin']);

Route::get('/delete-message/{id}', [AdminController::class, 'deleteMsg'])->middleware(['auth', 'admin']);

Route::post('/mail/{id}', [AdminController::class, 'Mail'])->middleware(['auth', 'admin']);

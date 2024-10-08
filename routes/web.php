<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Events\Example;
use App\Models\User;
use App\Models\Message;
use App\Events\Chat\ExampleTwo;
use App\Events\OrderDispatch;
use App\Models\Order;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/broadcast', function () {
//    broadcast(new Example(User::find(1), Message::find(1)));
    broadcast(new OrderDispatch(User::find(1), Order::find(1)));
//    broadcast(new ExampleTwo());
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

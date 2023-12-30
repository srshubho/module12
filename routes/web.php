<?php

use App\Models\User;
use App\Http\Controllers\SeatAllocationController;
use App\Http\Controllers\TripController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;

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
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return view('pages.home');
})->name('home');
Route::get('/dashboard', function () {
    $bookedSeats = DB::table('seat_allocations')->sum('number_of_seats');
    $countTrips = DB::table('seat_allocations')->distinct()->count('trip_id');


    return view('pages.dashboard', compact('bookedSeats', 'countTrips'));
})->name('dashboard')->middleware('auth');
Route::get('/login', function () {
    $randomUserId = User::inRandomOrder()->where('is_admin', 0)->first()->id;
    $randomUser = User::find($randomUserId);
    auth()->login($randomUser);

    return redirect()->route('dashboard');
})->name('login');
Route::get('/login/admin', function () {
    $randomUserId = User::where('is_admin', 1)->first()->id;
    $randomUser = User::find($randomUserId);
    auth()->login($randomUser);

    return redirect()->route('dashboard');
})->name('login.admin');
Route::get('logout', function () {
    Auth::logout();
    return redirect()->route('home');
})->name('logout');
Route::middleware(['auth'])->group(function () {
    Route::post('/trips/search', [TripController::class, 'search'])->name('trips.search');
    Route::resource('locations', LocationController::class);
    Route::resource('trips', TripController::class);
    Route::get('tickets/{trip}', [SeatAllocationController::class, 'create'])->name('tickets.create');
    Route::post('tickets', [SeatAllocationController::class, 'store'])->name('tickets.store');
    Route::get('show', [SeatAllocationController::class, 'show'])->name('tickets.show');
    Route::get('/tickets', [SeatAllocationController::class, 'index'])->name('tickets.index');
    Route::delete('/tickets/{seatAllocation}', [SeatAllocationController::class, 'destroy'])->name('tickets.destroy');
});

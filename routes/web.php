<?php
use App\Http\Controllers\EventController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrganizersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
});

// Organizer Routes
Route::middleware(['auth', 'role:organizer'])->group(function () {
    Route::get('/organizers/dashboard', [OrganizersController::class, 'dashboard'])->name('organizers.dashboard');

    // Event Routes
    Route::get('/organisers/create-event', [OrganizersController::class, 'create'])->name('organisers.create_event');
    Route::post('/organizers/events', [OrganizersController::class, 'storeEvent'])->name('organizers.events.store');
    Route::get('/organizers/events/{id}/edit', [OrganizersController::class, 'editEvent'])->name('organizers.events.edit');
    Route::put('/organizers/events/{id}', [OrganizersController::class, 'updateEvent'])->name('organizers.events.update');
    Route::delete('/organizers/events/{id}', [OrganizersController::class, 'deleteEvent'])->name('organizers.events.delete');
});

// Event Routes (if you want to manage events via EventController too)
Route::resource('events', EventController::class);


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController; // Добавьте импорт вашего ProfileController
use App\Http\Controllers\SidebarController;
use App\Http\Controllers\TablesdataController;
use App\Http\Controllers\TablesgeneralController;
use App\Http\Controllers\LogoutController;

Route::match(['GET', 'POST'], 'login', [LoginController::class, 'login'])
    ->name('login')
    ->middleware('guest')
    ->withoutMiddleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'home'])->name('home');
    Route::get('/footer', [FooterController::class, 'showFooter'])->name('show.Footer');
    Route::get('/header', [HeaderController::class, 'showHeader'])->name('show.Header');
    Route::get('/sidebar', [SidebarController::class, 'showSidebar'])->name('show.Sidebar');
    Route::get('/settings', [SettingsController::class, 'showSettings'])->name('show.settings');
    Route::get('/tabledata', [TablesdataController::class, 'showTablesdata'])->name('show.tabledata');
    Route::get('/tablesgeneral', [TablesgeneralController::class, 'showTablesgeneral'])->name('show.tablegeneral');
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('show.profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});

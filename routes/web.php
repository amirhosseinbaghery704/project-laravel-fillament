<?php
use App\Http\Controllers\templatecontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', [templatecontroller::class, 'index'])->name('home');
Route::get('/about', [templatecontroller::class, 'about'])->name('about');
Route::get('/login', [templatecontroller::class, 'login'])->name('login');
Route::get('/single/{id}', [templatecontroller::class, 'single'])->name('single'); 
Route::get('/blog', [templatecontroller::class, 'blog'])->name('blog'); 
Route::get('/search', [templateController::class, 'search'])->name('search');
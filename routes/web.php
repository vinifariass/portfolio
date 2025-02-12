<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\PortfolioItemController;
use App\Http\Controllers\Admin\PortfolioSectionSetting;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TyperTitleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;

Route::get('/',[HomeController::class, 'index'])->name('home');

Route::get('/blog', function () {
    return view('frontend.blog');
});

Route::get('/blog-details', function () {
    return view('frontend.blog-details');
});

Route::get('/portfolio-details', function () {
    return view('frontend.portfolio-details');
});


Route::get('/dashboard', [DashboardController::class, 'index'] )->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*Admin Routes*/
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('hero', HeroController::class);
    Route::resource('typer-title', TyperTitleController::class);

    /*Service Routes*/
    Route::resource('service', ServiceController::class);

    /*About Routes*/
    Route::get('resume/download', [AboutController::class, 'resumeDownload'])->name('resume.download');
    Route::resource('about', AboutController::class);

    /*Portfolio Category Routes*/
    Route::resource('category', CategoryController::class);

    /*Portfolio Item Routes*/
    Route::resource('portfolio-item', PortfolioItemController::class);

    /*Portfolio Section Setting Routes*/
    Route::resource('portfolio-section-setting', PortfolioSectionSetting::class);
});

require __DIR__.'/auth.php';

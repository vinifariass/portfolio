<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogSectionSettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactSectionSettingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\FeedbackSectionSettingController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\PortfolioItemController;
use App\Http\Controllers\Admin\PortfolioSectionSettingController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SkillItemController;
use App\Http\Controllers\Admin\SkillSectionSettingController;
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

Route::get('portfolio-details/{id}',[HomeController::class, 'showPortfolio'])->name('show.portfolio');
Route::get('blog-details/{id}',[HomeController::class, 'showBlog'])->name('show.blog');
Route::get('blogs',[HomeController::class, 'blog'])->name('blog');
Route::post('contact',[HomeController::class, 'contact'])->name('contact');

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
    Route::resource('portfolio-section-setting', PortfolioSectionSettingController::class);

    /* Skill Section Setting Routes */
    Route::resource('skill-section-setting', SkillSectionSettingController::class);

    /* Skill Item Routes */
    Route::resource('skill-item', SkillItemController::class);

    /* Experience Routes */
    Route::resource('experience', ExperienceController::class);

    /* Feedback Routes */
    Route::resource('feedback', FeedbackController::class);

    /*Feedback Section Setting Routes*/
    Route::resource('feedback-section-setting', FeedbackSectionSettingController::class);

    /* Blog Category Routes */
    Route::resource('blog-category', BlogCategoryController::class);

    /* Blog Routes */
    Route::resource('blog', BlogController::class);

    /* Blog Section Setting Routes */
    Route::resource('blog-section-setting', BlogSectionSettingController::class);

    /*Contact Section Setting Routes*/
    Route::resource('contact-section-setting', ContactSectionSettingController::class);

});

require __DIR__.'/auth.php';

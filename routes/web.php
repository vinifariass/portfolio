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
use App\Http\Controllers\Admin\FooterContactInfoController;
use App\Http\Controllers\Admin\FooterHelpLinkController;
use App\Http\Controllers\Admin\FooterInfoController;
use App\Http\Controllers\Admin\FooterSocialLinkController;
use App\Http\Controllers\Admin\FooterUsefulLinkController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\PortfolioItemController;
use App\Http\Controllers\Admin\PortfolioSectionSettingController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SeoSettingController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SkillItemController;
use App\Http\Controllers\Admin\SkillSectionSettingController;
use App\Http\Controllers\Admin\TyperTitleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/blog', function () {
    return view('frontend.blog');
});

Route::get('/blog-details', function () {
    return view('frontend.blog-details');
});

Route::get('/portfolio-details', function () {
    return view('frontend.portfolio-details');
});


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/* Frontend Routes */
Route::get('portfolio-details/{id}', [HomeController::class, 'showPortfolio'])->name('show.portfolio');
Route::get('blog-details/{id}', [HomeController::class, 'showBlog'])->name('show.blog');
Route::get('blogs', [HomeController::class, 'blog'])->name('blog');
Route::post('contact', [HomeController::class, 'contact'])->name('contact');
Route::get('resume/download', [AboutController::class, 'resumeDownload'])->name('resume.download');

/*Admin Routes*/
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('hero', HeroController::class);
    Route::resource('typer-title', TyperTitleController::class);

    /*Service Routes*/
    Route::resource('service', ServiceController::class);

    /*About Routes*/
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

    /* Footer Social Link Routes */
    Route::resource('footer-social', FooterSocialLinkController::class);
    /* Footer Info Routes */
    Route::resource('footer-info', FooterInfoController::class);

    /* Footer Contact Info Routes */
    Route::resource('footer-contact-info', FooterContactInfoController::class);

    /* Footer Useful Links Routes */
    Route::resource('footer-useful-links', FooterUsefulLinkController::class);

    /* Footer Help Links Routes */
    Route::resource('footer-help-links', FooterHelpLinkController::class);

    /* Setting Route   */
    Route::get('setting',SettingController::class)->name('setting.index');

    /* General Setting Route */
    Route::resource('general-setting', GeneralSettingController::class);

    /* Seo Setting Route */
    Route::resource('seo-setting', SeoSettingController::class);
});

require __DIR__ . '/auth.php';

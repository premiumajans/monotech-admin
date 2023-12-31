<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:admin', 'as' => 'backend.'], function () {
//General
    Route::get('change-language/{lang}', [App\Http\Controllers\Backend\LanguageController::class, 'switchLang'])->name('switchLang');
    Route::get('/', [App\Http\Controllers\Backend\HomeController::class, 'index'])->name('index');
    Route::get('dashboard', [App\Http\Controllers\Backend\HomeController::class, 'index'])->name('dashboard');
    Route::get('reports', [App\Http\Controllers\Backend\ReportController::class, 'index'])->name('report');
    Route::get('give-permission', [App\Http\Controllers\Backend\PermissionController::class, 'givePermission'])->name('givePermission');
    Route::get('give-permission-to-user/{user}', [App\Http\Controllers\Backend\PermissionController::class, 'giveUserPermission'])->name('giveUserPermission');
    Route::get('contact-us/{id}/read', [App\Http\Controllers\Backend\ContactController::class, 'readContact'])->name('readContact');
    Route::post('give-permission-to-user-update', [App\Http\Controllers\Backend\PermissionController::class, 'giveUserPermissionUpdate'])->name('givePermissionUserUpdate');
    Route::get('slider/{id}/change-order', [App\Http\Controllers\Backend\SliderController::class, 'sliderOrder'])->name('sliderOrder');
    Route::get('newsletter/history', [App\Http\Controllers\Backend\NewsletterController::class, 'newsletterHistory'])->name('newsletterHistory');
    Route::post('change-category', [App\Http\Controllers\Backend\ContentController::class, 'changeCategory'])->name('changeCategory');
    Route::post('change-alt-category', [App\Http\Controllers\Backend\ContentController::class, 'changeAltCategory'])->name('changeAltCategory');

    Route::get('delete/photo/{model}/{id}', [App\Http\Controllers\Backend\HomeController::class, 'deletePhoto'])->name('deletePhoto');
    Route::group(['name' => 'status'], function () {
        Route::get('certificate/{id}/change-status', [App\Http\Controllers\Backend\SertificateController::class, 'status'])->name('sertificateStatus');
        Route::get('project/{id}/change-status', [App\Http\Controllers\Backend\ProjectController::class, 'status'])->name('projectStatus');
        Route::get('faq/{id}/change-status', [App\Http\Controllers\Backend\FaqController::class, 'status'])->name('faqStatus');
        Route::get('partner/{id}/change-status', [App\Http\Controllers\Backend\PartnerController::class, 'status'])->name('partnerStatus');
        Route::get('product/{id}/change-status', [App\Http\Controllers\Backend\ProductController::class, 'status'])->name('productStatus');
        Route::get('portfolio/{id}/change-status', [App\Http\Controllers\Backend\PortfolioController::class, 'status'])->name('portfolioStatus');
        Route::get('category/{id}/change-status', [App\Http\Controllers\Backend\CategoryController::class, 'status'])->name('categoryStatus');
        Route::get('mail/{id}/change-status', [App\Http\Controllers\Backend\MailController::class, 'status'])->name('mailStatus');
        Route::get('about/{id}/change-status', [App\Http\Controllers\Backend\AboutController::class, 'status'])->name('aboutStatus');
        Route::get('content/{id}/change-status', [App\Http\Controllers\Backend\ContentController::class, 'status'])->name('contentStatus');
        Route::get('/site-language/{id}/change-status', [App\Http\Controllers\Backend\SiteLanguageController::class, 'siteLanStatus'])->name('site-languagesStatus');
        Route::get('/settings/{id}/change-status', [App\Http\Controllers\Backend\SettingController::class, 'settingStatus'])->name('settingsStatus');
        Route::get('/seo/{id}/change-status', [App\Http\Controllers\Backend\MetaController::class, 'seoStatus'])->name('seoStatus');
        Route::get('/slider/{id}/change-status', [App\Http\Controllers\Backend\SliderController::class, 'sliderStatus'])->name('sliderStatus');
        Route::get('/permissions/{id}/change-status', function () {
            return redirect()->back();
        })->name('permissionsStatus');
    });
    Route::group(['name' => 'delete'], function () {
        Route::get('certificate/{id}/delete', [App\Http\Controllers\Backend\SertificateController::class, 'delete'])->name('sertificateDelete');
        Route::get('project/{id}/delete', [App\Http\Controllers\Backend\ProjectController::class, 'delete'])->name('projectDelete');
        Route::get('faq/{id}/delete', [App\Http\Controllers\Backend\FaqController::class, 'delete'])->name('faqDelete');
        Route::get('category/{id}/delete', [App\Http\Controllers\Backend\CategoryController::class, 'delete'])->name('categoryDelete');
        Route::get('partner/{id}/delete', [App\Http\Controllers\Backend\PartnerController::class, 'delete'])->name('partnerDelete');
        Route::get('product/{id}/delete', [App\Http\Controllers\Backend\ProductController::class, 'delete'])->name('productDelete');
        Route::get('portfolio/{id}/delete', [App\Http\Controllers\Backend\PortfolioController::class, 'delete'])->name('portfolioDelete');
        Route::get('mail/{id}/delete', [App\Http\Controllers\Backend\MailController::class, 'delete'])->name('mailDelete');
        Route::get('about/{id}/delete', [App\Http\Controllers\Backend\AboutController::class, 'delete'])->name('aboutDelete');
        Route::get('content/{id}/delete', [App\Http\Controllers\Backend\ContentController::class, 'delete'])->name('contentDelete');
        Route::get('content/photo/{id}/delete', [App\Http\Controllers\Backend\ContentController::class, 'deletePhoto'])->name('contentPhotoDelete');
        Route::get('/site-languages/{id}/delete', [App\Http\Controllers\Backend\SiteLanguageController::class, 'delSiteLang'])->name('site-languagesDelete');
        Route::get('/contact-us/{id}/delete', [App\Http\Controllers\Backend\ContactController::class, 'delContactUS'])->name('delContactUS');
        Route::get('/settings/{id}/delete', [App\Http\Controllers\Backend\SettingController::class, 'delSetting'])->name('settingsDelete');
        Route::get('/users/{id}/delete', [App\Http\Controllers\Backend\AdminController::class, 'delAdmin'])->name('delAdmin');
        Route::get('/seo/{id}/delete', [App\Http\Controllers\Backend\MetaController::class, 'delSeo'])->name('delSeo');
        Route::get('/slider/{id}/delete', [App\Http\Controllers\Backend\SliderController::class, 'delSlider'])->name('sliderDelete');
        Route::get('/report/{id}/delete', [App\Http\Controllers\Backend\ReportController::class, 'delReport'])->name('delReport');
        Route::get('/report/clean-all', [App\Http\Controllers\Backend\ReportController::class, 'cleanAllReport'])->name('cleanAllReport');
        Route::get('/permission/{id}/delete', [App\Http\Controllers\Backend\PermissionController::class, 'delPermission'])->name('permissionsDelete');
        Route::get('/newsletter/{id}/delete', [App\Http\Controllers\Backend\NewsletterController::class, 'delNewsletter'])->name('delNewsletter');
    });
    Route::group(['name' => 'resource'], function () {
        Route::resource('/sertificate', App\Http\Controllers\Backend\SertificateController::class);
        Route::resource('/project', App\Http\Controllers\Backend\ProjectController::class);
        Route::resource('/faq', App\Http\Controllers\Backend\FaqController::class);
        Route::resource('/partner', App\Http\Controllers\Backend\PartnerController::class);
        Route::resource('/categories', App\Http\Controllers\Backend\CategoryController::class);
        Route::resource('/product', App\Http\Controllers\Backend\ProductController::class);
        Route::resource('/portfolio', App\Http\Controllers\Backend\PortfolioController::class);
        Route::resource('/mail', App\Http\Controllers\Backend\MailController::class);
        Route::resource('/content', App\Http\Controllers\Backend\ContentController::class);
        Route::resource('/site-languages', App\Http\Controllers\Backend\SiteLanguageController::class);
        Route::resource('/contact-us', App\Http\Controllers\Backend\ContactController::class);
        Route::resource('/about', App\Http\Controllers\Backend\AboutController::class);
        Route::resource('/settings', App\Http\Controllers\Backend\SettingController::class);
        Route::resource('/users', App\Http\Controllers\Backend\AdminController::class);
        Route::resource('/informations', App\Http\Controllers\Backend\InformationController::class);
        Route::resource('/seo', App\Http\Controllers\Backend\MetaController::class);
        Route::resource('/newsletter', App\Http\Controllers\Backend\NewsletterController::class);
        Route::resource('/slider', App\Http\Controllers\Backend\SliderController::class);
        Route::resource('/permissions', App\Http\Controllers\Backend\PermissionController::class);
    });
});
Route::fallback(function () {
//    return view('backend.errors.404');
});
//Route::get();
Route::group(['name' => 'auth'], function () {
    Route::get('/login', [App\Http\Controllers\Backend\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('loginAdmin', [App\Http\Controllers\Backend\AuthController::class, 'login'])->name('loginPost');
    Route::post('logout', [App\Http\Controllers\Backend\AuthController::class, 'logout'])->name('logout');
});

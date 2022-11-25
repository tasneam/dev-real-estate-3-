<?php

use App\Http\Controllers\web\WebController;
use Illuminate\Support\Facades\Route;


Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});


Route::group(['prefix' => '{locale}', 'where' => ['locale' => '[a-zA-Z]{2}'], 'middleware' => 'setlocale'], function() {

    Route::get('index', [ WebController::class ,'index'])->name('web.home');
    Route::get('about', [ WebController::class ,'about'])->name('web.about');
    Route::get('real', [ WebController::class ,'real'])->name('web.realestate-grid');
    Route::get('realsingle/{id}', [ WebController::class ,'realsingle'])->name('web.realestate-single');
    Route::get('page/{id}', [ WebController::class ,'page'])->name('web.page');


    Route::get('tourism', [ WebController::class ,'tourism'])->name('web.tourism-grid');
    // Route::get('tourismsingle/{id}', [ WebController::class ,'tourismSingle'])->name('web.tourism-single');
    Route::get('tourismsingle/{id}', [ WebController::class ,'tourismSingle'])->name('web.tourismsingle');

    Route::get('studentServices', [ WebController::class ,'Suniversity'])->name('web.studentServices');
   
    // Route::post('university', [ WebController::class ,'studentServices'])->name('web.university');
    Route::get('contactus', [WebController::class,'contactUsIndex'])->name('web.contactus');
    

     });


Route::prefix('web/')->group( function(){

Route::post('PostSearch', [ WebController::class ,'PostSearch'])->name('web.PostSearch');
Route::post('Reservation', [ WebController::class ,'Reservation'])->name('web.Reservation');
Route::post('save', [WebController::class,'contactUsStore']);
Route::post('customerdata', [WebController::class,'customerdata']);
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Settings
    Route::delete('settings/destroy', 'SettingsController@massDestroy')->name('settings.massDestroy');
    Route::post('settings/media', 'SettingsController@storeMedia')->name('settings.storeMedia');
    Route::post('settings/ckmedia', 'SettingsController@storeCKEditorImages')->name('settings.storeCKEditorImages');
    Route::resource('settings', 'SettingsController');

    // Social Links
    Route::delete('social-links/destroy', 'SocialLinksController@massDestroy')->name('social-links.massDestroy');
    Route::resource('social-links', 'SocialLinksController');

    // Pages
    Route::delete('pages/destroy', 'PagesController@massDestroy')->name('pages.massDestroy');
    Route::post('pages/media', 'PagesController@storeMedia')->name('pages.storeMedia');
    Route::post('pages/ckmedia', 'PagesController@storeCKEditorImages')->name('pages.storeCKEditorImages');
    Route::resource('pages', 'PagesController');

    // City
    Route::delete('cities/destroy', 'CityController@massDestroy')->name('cities.massDestroy');
    Route::resource('cities', 'CityController');

    // Language
    Route::delete('languages/destroy', 'LanguageController@massDestroy')->name('languages.massDestroy');
    Route::resource('languages', 'LanguageController');

    // Realestates
    Route::delete('realestates/destroy', 'RealestatesController@massDestroy')->name('realestates.massDestroy');
    Route::post('realestates/media', 'RealestatesController@storeMedia')->name('realestates.storeMedia');
    Route::post('realestates/ckmedia', 'RealestatesController@storeCKEditorImages')->name('realestates.storeCKEditorImages');
    Route::resource('realestates', 'RealestatesController');

    // Department
    Route::delete('departments/destroy', 'DepartmentController@massDestroy')->name('departments.massDestroy');
    Route::resource('departments', 'DepartmentController');

    // University
    Route::delete('universities/destroy', 'UniversityController@massDestroy')->name('universities.massDestroy');
    Route::resource('universities', 'UniversityController');

    // Travel
    Route::delete('travels/destroy', 'TravelController@massDestroy')->name('travels.massDestroy');
    Route::post('travels/media', 'TravelController@storeMedia')->name('travels.storeMedia');
    Route::post('travels/ckmedia', 'TravelController@storeCKEditorImages')->name('travels.storeCKEditorImages');
    Route::resource('travels', 'TravelController');

    // Customer Data
    Route::delete('customer-datas/destroy', 'CustomerDataController@massDestroy')->name('customer-datas.massDestroy');
    Route::post('customer-datas/media', 'CustomerDataController@storeMedia')->name('customer-datas.storeMedia');
    Route::post('customer-datas/ckmedia', 'CustomerDataController@storeCKEditorImages')->name('customer-datas.storeCKEditorImages');
    Route::resource('customer-datas', 'CustomerDataController');

    // Contact Us
    Route::delete('contact-uss/destroy', 'ContactUsController@massDestroy')->name('contact-uss.massDestroy');
    Route::resource('contact-uss', 'ContactUsController');

    // Items
    Route::delete('items/destroy', 'ItemsController@massDestroy')->name('items.massDestroy');
    Route::post('items/media', 'ItemsController@storeMedia')->name('items.storeMedia');
    Route::post('items/ckmedia', 'ItemsController@storeCKEditorImages')->name('items.storeCKEditorImages');
    Route::resource('items', 'ItemsController');

    // Slider
    Route::delete('sliders/destroy', 'SliderController@massDestroy')->name('sliders.massDestroy');
    Route::post('sliders/media', 'SliderController@storeMedia')->name('sliders.storeMedia');
    Route::post('sliders/ckmedia', 'SliderController@storeCKEditorImages')->name('sliders.storeCKEditorImages');
    Route::resource('sliders', 'SliderController');

    // Services
    Route::delete('services/destroy', 'ServicesController@massDestroy')->name('services.massDestroy');
    Route::post('services/media', 'ServicesController@storeMedia')->name('services.storeMedia');
    Route::post('services/ckmedia', 'ServicesController@storeCKEditorImages')->name('services.storeCKEditorImages');
    Route::resource('services', 'ServicesController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});



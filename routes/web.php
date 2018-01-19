<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [function () {
    return redirect(route('home'));
}])->name('root');

Route::get('a/{id}', function ($id) {
    return redirect()->route('affiliate-cookie', $id);
});

Route::group(['prefix' => $locale = language_prefix()], function() use ($locale) {
    App::setLocale($locale);

    Route::group(['prefix' => '/token'], function () {
        Route::get('/', 'ContentController@home')->name('home');
        Route::get('/gift', 'ContentController@airdrop')->name('airdrop-gift');
        Route::get('/airdrop', 'ContentController@home')->name('airdrop');
        Route::get('/mvp', 'ContentController@mvp')->name('mvp');
        Route::get('/faq', 'ContentController@faq')->name('faq');
        Route::get('/ico.json', 'ContentController@icoData')->name('ico-data');
        Route::get('/aff/{id}', 'UserController@setAffiliateCookie')->name('affiliate-cookie');

        // User area
        Route::group(['middleware' => 'auth'], function () {
            Route::get('/user', 'UserController@user')->name('user');
            Route::get('/affiliate', 'UserController@affiliate')->name('affiliate');
            Route::get('/affiliate2', 'UserController@affiliate2')->name('affiliate2');
            Route::get('/affiliate3', 'UserController@affiliate3')->name('affiliate3');
            Route::get('/affiliate4', 'UserController@affiliate4')->name('affiliate4');
            Route::get('/affiliate5', 'UserController@affiliate5')->name('affiliate5');
            Route::get('/refund', 'UserController@showRefund')->name('refund');
            Route::post('/refund', 'UserController@refund');
            Route::get('/address', 'UserController@address')->name('address');
            Route::get('/profile', 'UserController@showDetails')->name('details');
            Route::post('/profile', 'UserController@details');
            Route::get('/wallet', 'UserController@showWallet')->name('wallet');
            Route::post('/wallet', 'UserController@wallet');
            Route::get('/identification', 'UserController@showIdentification')->name('identification');
            Route::post('/identification', 'UserController@identification');
            Route::get('/password', 'UserController@showPassword')->name('password');
            Route::post('/password', 'UserController@password');
            Route::get('/participate', 'UserController@participate')->name('participate');
            Route::get('/participate2', 'UserController@participate2')->name('participate2');
            Route::get('/participate3', 'UserController@participate3')->name('participate3');
            Route::get('/participate4', 'UserController@participate4')->name('participate4');
            Route::get('/participate5', 'UserController@participate5')->name('participate5');
            Route::get('/participatefaq', 'UserController@participatefaq')->name('participatefaq');
        });

        // Statistics and mailing list export
        // Route::get('/admin/stats', 'AdminController@stats')->name('admin.stats'); @todo
        Route::get('/admin/emails', 'AdminController@emails')->name('admin.emails');
        Route::get('/txns', 'AdminController@txns')->name('admin.txns');

        // Authentication Routes...
        Route::get('login/{destination?}', 'Auth\LoginController@showLoginForm')->name('login');
        Route::get('platform/{destination}', 'Auth\LoginController@platformLogin')->name('platform-login');
        Route::post('login', 'Auth\LoginController@loginOrSignUp');
        Route::post('logout', 'Auth\LoginController@logout')->name('logout');

        // Registration Routes...
        Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'Auth\RegisterController@register');

        // Password Reset Routes...
        Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('password/reset', 'Auth\ResetPasswordController@reset');

        // Email verification routes...
        Route::get('verify/{id}/{token}', 'Auth\EmailVerificationController@verify')->name('verify-email');
    });

    Route::get('/course/{course}/lesson/{lesson}', 'ContentController@lesson')->name('lesson');
    Route::get('/course/{course}/lesson/{lesson}/attachment/{attachment}/download', 'ContentController@lessonAttachmentDownload')->name('lesson-attachment');
    Route::get('/course/{course}', 'ContentController@course')->name('course');
    Route::get('/landing/course/{course}', 'ContentController@redirectLanding');
});


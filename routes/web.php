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

/*Route::get('/home/{name?}','HomeController@index');
Route::get('/second','HomeController@second');*/



Route::group(['prefix' => 'admin'], function () {
  Route::get('/', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'student'], function () {
  Route::get('/login', 'StudentAuth\LoginController@showLoginForm')->name('login');
  Route::get('/', 'StudentAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'StudentAuth\LoginController@login');
  Route::post('/logout', 'StudentAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'StudentAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'StudentAuth\RegisterController@register');

  Route::post('/password/email', 'StudentAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'StudentAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'StudentAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'StudentAuth\ResetPasswordController@showResetForm');

    Route::post('forgetpassword', 'StudentAuth\ForgotPasswordController@forget_password')->name('forgetpassword');
    Route::get('verifyaccount/{token}', 'StudentAuth\LoginController@verifyAccount')->name('verifyaccount');
    Route::get('/reset/{token}', 'StudentAuth\ResetPasswordController@showResetForm')->name('passwordresetview');
    Route::post('/reset_password', 'StudentAuth\ResetPasswordController@reset_password')->name('passwordreset');
});

Route::group(['prefix' => 'school'], function () {
  Route::get('/login', 'SchoolAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'SchoolAuth\LoginController@login');
  Route::post('/logout', 'SchoolAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'SchoolAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'SchoolAuth\RegisterController@register');

  Route::post('/password/email', 'SchoolAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'SchoolAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'SchoolAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'SchoolAuth\ResetPasswordController@showResetForm');

    Route::post('forgetpassword', 'SchoolAuth\ForgotPasswordController@forget_password')->name('forgetpassword');
    Route::get('verifyaccount/{token}', 'SchoolAuth\LoginController@verifyAccount')->name('verifyaccount');
    Route::get('/reset/{token}', 'SchoolAuth\ResetPasswordController@showResetForm')->name('passwordresetview');
    Route::post('/reset_password', 'SchoolAuth\ResetPasswordController@reset_password')->name('passwordreset');
});

//Route::middleware(Localization::class)->group(function () {
    Route::get('/home', 'Pages\HomePageController@index')->name('home');
    Route::get('/', 'Pages\HomePageController@index')->name('home');
    Route::get('/home/featureCourses/{id}', 'Pages\HomePageController@getFeatureCourses');
    Route::get('/about-us', 'Pages\PageController@aboutUs')->name('about_us');
    Route::get('/contact-us', 'Pages\PageController@contactUs')->name('contact_us');
    Route::post('/contact_us/sendMessage', 'Pages\PageController@sendMessage')->name('contact_us.sendMessage');

    Route::get('/faq', 'Pages\PageController@faq')->name('faq');
    Route::get('/privacy-policy', 'Pages\PageController@privacyPolicy')->name('privacy_policy');
    Route::get('/terms-and-condition', 'Pages\PageController@termsCondition')->name('terms_condition');
    Route::get('/site-map', 'Pages\PageController@siteMap')->name('site_map');

    Route::post('/weekly_news_letter/get', 'Pages\HomePageController@getWeeklyNewsLetter')->name('weekly_news_letter.get');

    Route::get('/courses/search/', 'Pages\HomePageController@listCourses');
    Route::get('/search-courses/', 'Pages\HomePageController@searchCourses');
    Route::get('/category/options', 'Pages\HomePageController@getCategoryOptions');

    Route::get('/category/getCategoryCourses', 'Pages\HomePageController@getCategoryCourses');

    Route::get('/courses/course_detail/{id}', 'Pages\CoursePageController@getCourseDetail');

    Route::post('/courses/cart/add', 'Pages\CourseCartController@addCourseCart');
    Route::get('/courses/cart', 'Pages\CourseCartController@index');
    Route::post('/courses/cart/update', 'Pages\CourseCartController@updateCourseCart');
    Route::post('/courses/remove_item', 'Pages\CourseCartController@removeCourseCart');

    Route::get('/courses/all_cart_items', 'Pages\CourseCartController@getAllCartItems');
    // review
    Route::post('/courses/add_review', 'Pages\CoursePageController@addCourseReview');

    Route::post('/courses/reviews/load_more', 'Pages\CoursePageController@loadMoreCourseReviews');
//});

Route::get('select-lang/{locale}','DashboardController@setLanguage');
Route::get('page_content/{key}', 'ContentPageController@index');
Route::post('/courses/bookmark', 'CourseController@bookmarkCourse');
Route::post('/courses/increase_views', 'CourseController@increaseProfileViews');

Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@handleProviderCallback');
Route::get('/redirectgoogle', 'SocialAuthController@redirectGoogle');
Route::get('/callbackgoogle', 'SocialAuthController@handleProviderCallbackGoogle');

Route::get('/chat/{name?}','ChatController@index');
Route::get('/second','ChatController@second');

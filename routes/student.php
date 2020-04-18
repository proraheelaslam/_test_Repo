<?php

/*Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('student')->user();

    //dd($users);

    return view('student.home');
})->name('home');*/
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::post('/views_report', 'DashboardController@viewsAjaxReport');
Route::get('/profile', 'UserController@profileView');
Route::post('/profile', 'UserController@updateProfile');

Route::get('/messages/{id}', 'MessageController@index');
Route::get('/get_messages', 'MessageController@getMessages');
Route::post('/post_message', 'MessageController@postMessage');
Route::get('/search_thread', 'MessageController@searchThread');
Route::post('/create_thread', 'MessageController@createThread');

Route::get('/my_courses', 'CourseController@index');
Route::get('/courses/add_listing', 'CourseController@create');
Route::post('/courses/store_listing', 'CourseController@store');
Route::get('/courses/get_sub_category', 'CourseController@getSubCategory');
Route::get('/courses/search_course', 'CourseController@searchCourse');
Route::get('/courses/search_my_course', 'CourseController@searchMyCourse');
Route::get('/courses/filtered_course', 'CourseController@filteredCourse');
Route::get('/courses/delete_course/{id}', 'CourseController@deleteCourse');
Route::get('/courses/edit_listing/{id}', 'CourseController@edit');
Route::post('/courses/update', 'CourseController@update');
Route::get('/courses/course_video/{id?}', 'CourseController@courseVideo');
Route::get('/courses/get_answer' , 'CourseController@getAnswer');
Route::get('/courses/save_answer', 'CourseController@saveAnswer');

Route::get('/orders', 'OrderController@index');
Route::get('/orders/order_detail', 'OrderController@getOrderDetail');

Route::get('cart/checkout', 'CheckoutController@index');
Route::post('/order/save', 'CheckoutController@store');
Route::get('/order/success/{id}', 'CheckoutController@SuccessPayment');

Route::get('/order/cancel/{id}', 'CheckoutController@cancelPayment');
Route::get('/read_notification', 'DashboardController@readNotification');

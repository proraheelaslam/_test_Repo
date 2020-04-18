<?php

Route::get('home', 'HomeController@index');
Route::get('change_password', 'HomeController@showChangePasswordForm');
Route::post('change_password', 'HomeController@changePassword');

///Categories Routes//
Route::resource('categories', 'CategoriesController');
Route::get('subcategories/create/{id}', 'CategoriesController@subcatCreate');
Route::post('subcategories/create', 'CategoriesController@subcatPost');
Route::get('subcategories/{id}/edit', 'CategoriesController@subcatEdit');
Route::patch('subcategories/{id}', 'CategoriesController@subcatUpdate');
Route::delete('subcategories/{id}', 'CategoriesController@subcatDestroy');
Route::get('get_categories', 'CategoriesController@getCategories');
Route::post('/categories/remove_image_category', 'CategoriesController@RemoveImage');
// Subscriber

Route::resource('subscriber', 'SubscriberController');
Route::get('get_subscriber', 'SubscriberController@getSubscriber');

// chat thread

Route::resource('chats', 'ChatController');
Route::get('get_chat_thread', 'ChatController@getChatThread');
Route::post('chats/delete_message/{id}', 'ChatController@deleteMessage');
///Grades Routes//
Route::resource('grades', 'GradesController');
Route::get('get_grades', 'GradesController@getGrades');

///Classes Routes//
Route::resource('classes', 'ClassesController');
Route::get('get_classes', 'ClassesController@getClasses');

///Courses Routes//
Route::resource('courses', 'CoursesController');
Route::get('get_courses', 'CoursesController@getCourses');

///course content
Route::get('courses/course_content/{id}', 'CoursesController@ShowContent');
Route::get('get_courses_content', 'CoursesController@getCoursesContent');
Route::get('courses/create_content/{course_id}', 'CoursesController@CreateContent');
Route::post('/courses/content_save', 'CoursesController@SaveContent');
Route::get('courses/edit_content/{content_id}', 'CoursesController@EditContent');
Route::patch('/courses/update_content/{id}', 'CoursesController@UpdateContent');
Route::post('/courses/get_sub_category', 'CoursesController@getSubCategory');
///course content lectures
Route::get('courses/content_lecture/{content_id}', 'CoursesController@ShowLecture');
Route::get('get_courses_content_lecture', 'CoursesController@getCoursesContentLecture');
Route::get('courses/create_lecture/{content_id}', 'CoursesController@CreateLecture');
Route::post('/courses/lecture_save/{content_id}', 'CoursesController@SaveLecture');
Route::get('courses/edit_lecture/{lecture_id}', 'CoursesController@EditLecture');
Route::patch('/courses/update_lecture/{id}', 'CoursesController@UpdateLecture');
Route::get('/courses/delete_lecture/{id}', 'CoursesController@deleteLecture');
///course participants
Route::get('courses/course_participants/{course_id}', 'CoursesController@ShowParticipants');
Route::get('get_participants', 'CoursesController@getCourseParticipants');

///Business Plan Routes//
Route::resource('subscriptionplan', 'SubscriptionPlanController');
Route::get('get_subscriptionplan', 'SubscriptionPlanController@get_SubscriptionPlan');


Route::get('/courses/course_features/{id}', 'CoursesController@getCourseFeature');
Route::get('get_ajax_feature', 'CoursesController@getAjaxCourseFeature');
Route::get('/courses/delete_feature/{id}', 'CoursesController@deleteCourseFeature');

//Notification
Route::get('notifications', 'SettingsController@notification');
Route::post('/settings/send_notifications', 'SettingsController@update_notification');
//pages

Route::resource('content_pages', 'PagesController');

//email management
Route::resource('emails', 'EmailsController');

//School management
Route::resource('schools', 'SchoolsController');
Route::get('get_schools', 'SchoolsController@getSchools');
Route::post('school_status/{id}', 'SchoolsController@updatestatus')->name('school.updatestatus');
Route::post('school_reset_password/{id}', 'SchoolsController@resetpassword')->name('school.resetpassword');
Route::post('/schools/remove_image_school', 'SchoolsController@RemoveImage');

//Students management
Route::resource('users', 'StudentsController');
Route::get('get_users', 'StudentsController@getStudents');
Route::post('user_status/{id}', 'StudentsController@updatestatus')->name('student.updatestatus');
Route::post('user_reset_password/{id}', 'StudentsController@resetpassword')->name('student.resetpassword');
Route::post('/users/remove_image_user', 'StudentsController@RemoveImage');


//Ads management
Route::resource('ads', 'AdsController');
Route::get('get_ads', 'AdsController@getAds');
Route::post('feature_status/{id}', 'AdsController@FeatureStatus')->name('user.feature_status');
Route::get('ads/edit_review/{id}', 'AdsController@edit_review');
Route::patch('/ads/update_review/{id}', 'AdsController@update_review');
Route::get('ads/images/{id}', 'AdsController@AdImages');
Route::get('ads/reviews/{id}', 'AdsController@AdReviews');
Route::post('/ads/ad_review_delete/{id}', 'AdsController@AdReviewRemove');

//settnings
Route::get('settings', 'SettingsController@index');
Route::post('/settings/update', 'SettingsController@update');

///Orders Routes//
Route::get('/orders/all_order', 'OrdersController@AllOrders');
Route::get('/orders/get_orders', 'OrdersController@getOrders');
Route::get('/orders/delete_order/{id}', 'OrdersController@deleteOrder');
Route::get('/orders/order_detail/{id}', 'OrdersController@orderDetail');
Route::get('/orders/order_detailupdate/{id}', 'OrdersController@orderDetailEdit');
Route::post('/orders/updateorderstatus', 'OrdersController@orderUpdateStatus');

//news letter
Route::get('/news_letter', function(){return view('admin.pages.news_letter');});
Route::post('news_letter', 'HomeController@newsLetter');

//faq
Route::resource('faq','FaqController');
Route::resource('faq_types','FaqTypeController');


//Country
Route::resource('countries', 'CountriesController');
Route::get('get_countries', 'CountriesController@getCountries');

Route::post('/categories/make_feature', 'CategoriesController@makeFeature');
Route::post('/categories/make_popular', 'CategoriesController@makePopular');

Route::post('/courses/make_feature', 'CoursesController@makeFeature');
Route::post('/courses/content_lecture/make_feature', 'CoursesController@makeFeatureLecture');



Route::resource('menu_category', 'MenuCategoryController');
Route::get('get_menu_categories', 'MenuCategoryController@getMenuCategories');
Route::get('menu_category/get_menu_links/{cat_key}', 'MenuCategoryController@GetLinks');
Route::get('get_menu_links_all/{cat_key}', 'MenuCategoryController@getMenuLinksAll');
Route::get('menu_category/create_menu_link/{cat_key}', 'MenuCategoryController@create_link');
Route::post('menu_category/store_menu_link', 'MenuCategoryController@store_link');
Route::get('menu_category/edit_menu_link/{id}', 'MenuCategoryController@edit_link');
Route::patch('/menu_category/update_menu_link/{id}', 'MenuCategoryController@updateLink');

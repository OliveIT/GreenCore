<?php



Route::get('/', function () {
    return view('welcome');
});
Route::get('404',function (){
   return view('404');
});

Auth::routes();
Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');
Route::get('/home', 'HomeController@index')->name('home');

/*Users route*/
Route::get('/user/view', 'UserController@index');
Route::get('/user/edit/{id}/edit','UserController@edit');
Route::post('/user/edit/{id}/update','UserController@update');
Route::get('/user/delete/{id}/delete','UserController@destroy');

/*Locations route*/
Route::get('/location/create','LocationController@create');
Route::post('/location/create','LocationController@store');
Route::get('/location/view','LocationController@index');
Route::get('/location/edit/{id}/edit','LocationController@edit');
Route::post('/location/edit/{id}/update','LocationController@update');
Route::get('/location/delete/{id}/delete','LocationController@destroy');

/*Post route*/
Route::get('/post/create','PostController@create');
Route::post('/post/create','PostController@store');
Route::get('/post/view','PostController@index');
Route::get('/post/edit/{id}/edit','PostController@edit');
Route::post('/post/edit/{id}/update','PostController@update');
Route::get('/post/delete/{id}/delete','PostController@destroy');

/*font end route*/
Route::get('/','IndexController@create');
Route::get('teacher/details/post/{id}/view','FontendController@teacherPostDetails')->name('detailsTeacherPost');
Route::get('/teacher/search','IndexController@teacherSearch');

// font end  student route
Route::get('/student','StudentIndexController@create');
Route::get('student/details/post/{id}/view','StudentIndexController@studentPostDetails')->name('detailsStudentPost');
Route::get('/student/search','StudentIndexController@studentSearch');



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

Route::get('/', function () {
    return view('home');
});
Route::get('/404', function () {
    return view('404');
})->name('404');
Route::get('/home', function () {
    return view('home');
})->name('home');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/course', function () {
        return view('course/register');
    })->name('course');
    Route::post('/course', '\App\Http\Controllers\CourseController@register');
    Route::match(['GET', 'POST'], '/course/edit/{id}', '\App\Http\Controllers\CourseController@edit')->name('editCourse');
    Route::get('/course/delete/{id}', '\App\Http\Controllers\CourseController@delete')->name('deleteCourse');
    Route::get('/courses', '\App\Http\Controllers\CourseController@search')->name('courses');

    Route::match(['GET', 'POST'], '/student', '\App\Http\Controllers\StudentController@register')->name('student');
    Route::match(['GET', 'POST'], '/student/edit/{id}', '\App\Http\Controllers\StudentController@edit')->name('editStudent');
    Route::get('/student/delete/{id}', '\App\Http\Controllers\StudentController@delete')->name('deleteStudent');
    Route::get('/students', '\App\Http\Controllers\StudentController@search')->name('students');
});



// Route::get('/registerUser', function () {
//     return view('registerUser');
// })->name('registerUser');
// 
// Route::get('/registerCourse', function () {
//     return view('registerCourse');
// })->name('registerCourse');
// 
// Route::get('/login', function () {
//     return view('login');
// })->name('login');
// 
// Route::get('/about', function () {
//     return view('about');
// })->name('about');
// 
// Route::get('/searchUser', function () {
//     return view('searchUser');
// })->name('searchUser');
// 
// 
// Route::get('/searchCourse', function () {
//     return view('searchCourse');
// })->name('searchCourse');
// 
// 
// Route::get('/changeUser', function () {
//     return view('changeUser');
// })->name('changeUser');
// 
// Route::get('/changeCourse', function () {
//     return view('changeCourse');
// })->name('changeCourse');


/*

Route::get('/cadastroProduto', function () {
    return view('cadastroProduto');
})->name('cadastroProduto');

Route::post('/estoqueVenda', 'EstoqueController@venda')->name('EstoqueController@venda');

*/
Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

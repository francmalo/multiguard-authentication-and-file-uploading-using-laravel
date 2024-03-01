<?php
use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\Student\StudentController;
 use App\Http\Controllers\Admin\AdminController;
 use Illuminate\Support\Facades\Auth; // Add this line
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
    return view('welcome');
});


Auth::routes();
Route::prefix('student')->name('student.')->group(function(){
Route::middleware(['guest:student'])->group(function(){
Route::view('/login','student.login')->name('login');
Route::view('/register','student.register')->name('register');
Route::post('/create',[StudentController::class,'create'])->name('create');
Route::post('/dologin',[StudentController::class,'dologin'])->name('dologin');

});
Route::middleware(['auth:student'])->group(function(){
    Route::view('/home','student.home')->name('home');
    Route::post('/logout',[StudentController::class,'logout'])->name('logout');
});
});

// Route::get('/admin', function () {
//     return view('admin.dashboard');
// });
Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest:admin'])->group(function(){
    Route::view('/login','admin.login')->name('login');
    Route::post('/dologin',[AdminController::class,'dologin'])->name('dologin');

    });
    Route::middleware(['auth:admin'])->group(function(){
        Route::view('/home','admin.home')->name('home');
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
    });
    });


// Route::get('/home', 'HomeController@index')->name('home');

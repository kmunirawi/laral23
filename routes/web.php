<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome', ['name' => 'Ali', 'dept' => 'CS']);
});

Route::view('r1', 'student.index');


//Riquired - optional
Route::get('r2/{id}', function($id){
    return 'Parameter: ' . $id;
});

Route::get('r3/{id?}', function($id = null){
    return 'Parameter: ' . $id;
});

Route::view('r4', 'student.index', ['name' => 'Ali', 'dept' => 'CS'])->name('route4');

Route::redirect('r5', '/');
Route::redirect('r8', 'https://www.google.com');



Route::prefix('admin')->group(function(){

    Route::view('home', 'home');
    Route::view('profile', 'profile');
    Route::view('reset', 'reset');
});


// Route::get('users', [UserController::class, 'index'])->name('users.function');
// Route::get('createUser', [UserController::class, 'create']);
Route::resource('users', UserController::class)->names([
    'create' => 'new'
]);
// users.index !! users.create

Route::get('changePassword', [UserController::class, 'changePassword'])->name('users.changePassword');
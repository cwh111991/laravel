<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('hello', function () {
    return 'Hello Laravel!';
});

Route::get('/user', [UserController::class, 'index']);


/*Route::get('user/{id}', function ($id) {
    return 'User '.$id;
});*/

Route::get('user/{id}',[UserController::class, 'show']);

Route::post('test/{id}',[UserController::class, 'test']);

Route::match(['post','get'],'test1/{id}',[UserController::class, 'test1']);

Route::any('test2/{id}',[UserController::class, 'test2']);

Route::any('/there',[UserController::class, 'there']);

//Route::redirect('/here', '/there');
Route::permanentRedirect('/here', '/there');

Route::view('/welcome', 'welcome');

Route::get('posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return '$postId:'.$postId.'$commentId:'.$commentId;
});

Route::get('showname/{name?}', function ($name = 'lisi') {
    return $name;
});

Route::get('showname1/{id}/{name}', function ($id, $name) {
    return $id.$name;
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);


Route::get('showname2/{id}/{name}', function ($id, $name) {
    return $id.$name;
})->whereNumber('id')->whereAlpha('name');


Route::get('search/{search}', function ($search) {
    return $search;
})->where('search', '.*');

Route::get('user/profile', function () {
    return 'profile';
})->name('profile');

Route::get('user/profile1', [UserController::class, 'profile1'])->name('profile1');

Route::get('user/profile2', [UserController::class, 'profile2'])->name('profile2');

Route::get('user/{id}/profile3', function ($id) {
    return $id;
})->name('profile3');

Route::get('user/{id}/profile4', function ($id) {
    return route('profile3', ['id' => $id]);
})->name('profile4');


Route::get('user/{id}/profile5', function ($id) {
    return route('profile3', ['id' => $id, 'photos' => $id]);
})->name('profile5');


Route::middleware(['CheckAge'])->group(function () {
    Route::get('/', function () {
        // 使用 checkAge 中间件
    });

    Route::get('user/{age}/profile', function ($age) {
        // 使用 checkAge 中间件
        return $age;
    })->name('CheckAge_profile');
});

Route::prefix('admin')->group(function () {
    Route::get('users', function () {
        return route('admin');
    })->name('admin');
});

Route::name('admin.')->group(function () {
    Route::get('users', function () {
        return route('admin.users');
    })->name('users');
});

Route::get('api/users/{user}', function (App\Models\User $test) {
    return $test->email;
});

Route::get('test/show/{id}', [\App\Http\Controllers\TestController::class, 'show'])->middleware('test');

Route::get('test/show1/{id}', [\App\Http\Controllers\TestController::class, 'show1']);


Route::apiResource('photos', \App\Http\Controllers\PhotoController::class);


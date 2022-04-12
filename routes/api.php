<?php

use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Auth\RegisterController;
use App\Http\Controllers\Api\V1\InfoController;
use App\Http\Controllers\Api\V1\Posts\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function () {
    // Check working page.
    Route::get('/info', InfoController::class);

    Route::prefix('auth')->group(function () {
        Route::post('/register', [RegisterController::class, 'register'])->name('api.v1.auth.register');
        Route::post('/login', [LoginController::class, 'login'])->name('api.v1.auth.login');
    });

    // Auth protected routes.
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('test', function () {
            return 'ok';
        });
        Route::prefix('posts')->group(function () {
            Route::post('/', [PostController::class, 'create'])
                ->name('api.v1.posts.create');
        });
    });
});

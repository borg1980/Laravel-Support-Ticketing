<?php

use App\Http\Controllers\Api\V1\Admin\PermissionsApiController;
use App\Http\Controllers\Api\V1\Admin\RolesApiController;
use App\Http\Controllers\Api\V1\Admin\UsersApiController;
use App\Http\Controllers\Api\V1\Admin\StatusesApiController;
use App\Http\Controllers\Api\V1\Admin\PrioritiesApiController;
use App\Http\Controllers\Api\V1\Admin\CategoriesApiController;
use App\Http\Controllers\Api\V1\Admin\TicketsApiController;
use App\Http\Controllers\Api\V1\Admin\CommentsApiController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:api']], function (): void {
    // Permissions
    Route::apiResource('permissions', PermissionsApiController::class);

    // Roles
    Route::apiResource('roles', RolesApiController::class);

    // Users
    Route::apiResource('users', UsersApiController::class);

    // Statuses
    Route::apiResource('statuses', StatusesApiController::class);

    // Priorities
    Route::apiResource('priorities', PrioritiesApiController::class);

    // Categories
    Route::apiResource('categories', CategoriesApiController::class);

    // Tickets
    Route::post('tickets/media', [TicketsApiController::class, 'storeMedia'])->name('tickets.storeMedia');
    Route::apiResource('tickets', TicketsApiController::class);

    // Comments
    Route::apiResource('comments', CommentsApiController::class);
});

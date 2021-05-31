<?php

    Route::get('index.php', function () {
        IndexController::CreateView('IndexView');
    });

    Route::get('posts',[PostController::class, 'index']);
    Route::get('posts_create',[PostController::class, 'create']);
    Route::get('posts_edit',[PostController::class, 'edit']);

    Route::post('posts',[PostController::class, 'store']);

    Route::put('posts',[PostController::class, 'update']);




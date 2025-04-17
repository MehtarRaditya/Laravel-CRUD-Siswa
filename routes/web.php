<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;

Route::group(['controller' => SiswaController::class], function () {
    Route::get('/', 'welcome')->name('welcome');
    Route::post('/create', 'create')->name('create');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/save/{id}', 'save')->name('save');
    Route::post('/delete/{id}', 'delete')->name('delete');
});

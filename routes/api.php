<?php

// use Illuminate\Http\Request;
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

Route::namespace('Notes')->group(function() {
    Route::prefix('notes')->group(function() {
        Route::post('/create-new-notes', 'NoteController@store');
        Route::get('', 'NoteController@index');
        Route::get('/{note:slug}', 'NoteController@show')->name('notes.show');
        Route::patch('/{note:slug}/edit', 'NoteController@update');
        Route::delete('/{note:slug}/delete', 'NoteController@destroy');
    });

    Route::prefix('subjects')->group(function() {
        Route::get('', 'SubjectController@index');
        Route::post('/create-new-subject', 'SubjectController@store');
        Route::get('/{subject:slug}', 'SubjectController@show')->name('subjects.show');
        Route::patch('/{subject:slug}/edit', 'SubjectController@update');
        Route::delete('{subject:slug}/delete', 'SubjectController@destroy');
    });
});

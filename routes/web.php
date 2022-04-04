<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ProfileController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(
    [
        'middleware' => [
            'auth',
        ],
    ],function(){
        Route::resource('users',UserController::class);
    }
);

Route::group(
    [
        'middleware' => [
            'auth',
        ],
    ],function(){
        Route::resource('question',QuestionController::class);
        Route::get('/OptionIndex/{question}',[QuestionController::class,'OptionIndex'])->name('question.OptionIndex');
        Route::get('/OptionCreate/{question}',[QuestionController::class,'OptionCreate'])->name('question.OptionCreate');
        Route::post('/OptionStore',[QuestionController::class,'OptionStore'])->name('question.OptionStore');
        Route::get('/OptionEdit/{option}',[QuestionController::class,'OptionEdit'])->name('question.OptionEdit');
        Route::post('/OptionUpdate/{option}',[QuestionController::class,'OptionUpdate'])->name('question.OptionUpdate');
        Route::delete('/OptionDestroy/{option}',[QuestionController::class,'OptionDestroy'])->name('question.OptionDestroy');
    }
);

Route::group(
    [
        'middleware' => [
            'auth',
        ],
    ],function(){
        Route::resource('profile',ProfileController::class);
        Route::post('/menteeAnswers',[ProfileController::class, 'storeMenteeAnswers'])->name('profile.menteeAnswers');
    }
);

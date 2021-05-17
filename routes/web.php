<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\QuestionnaireController;
use Illuminate\Support\Facades\Auth;

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
Route::post('/app/check',[MainController::class,'check'])->name('app.check');

Route::get('/app/dashboard',[MainController::class,'dashboard'])->name('app.dashboard');
Route::group(['middleware'=>['isLogged']],function(){

    
    Route::get('/app/create/user',[ManageUserController::class,'create_user_view']);
    Route::post('/app/user/save',[ManageUserController::class,'user_save'])->name('app.user.save');

    Route::get('/app/user/{id}/edit',[ManageUserController::class,'edit_user']);
    Route::post('/app/user/update',[ManageUserController::class,'update_user'])->name('app.user.update');
    Route::get('/app/user/{id}/unsuspend',[ManageUserController::class,'unsuspend_user']);
    Route::get('/app/user/{id}/suspend',[ManageUserController::class,'suspend_user']);
    Route::get('/app/user/{id}/delete',[ManageUserController::class,'delete_user']);
    Route::get('/logout',[ManageUserController::class,'logout']);
    
    Route::get('/app/question',[QuestionnaireController::class,'question_view']);
    Route::post('/app/question/makequestion',[QuestionnaireController::class,'make_question'])->name('app.make.question');
    Route::post('/app/question/{id}/save',[QuestionnaireController::class,'save_answer']);

    Route::get('/app/answers',[QuestionnaireController::class,'answer_view']);
    Route::get('/app/charts',[QuestionnaireController::class,'chart_view']);
    Route::post('/app/chart/filter',[QuestionnaireController::class,'filter_chart']);


});


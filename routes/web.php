<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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
})->name('welcome');

Route::get('/RegisterAdmin', function () {
    return view('auth/RegisterAdmin');
})->name('Admin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//admin crud
Route::middleware(['auth', 'admins'])->group(function ()
{
//for user
Route::get('user','userController@index')->name('user.index');
Route::get('user/create','userController@create')->name('user.create');
Route::post('user/store','userController@store')->name('user.store');
Route::get('user/{id}/edit','userController@edit')->name('user.edit');
Route::put('user/{id}/update','userController@update')->name('user.update');
Route::delete('user/{id}/delete','userController@destroy')->name('user.delete');
Route::get('user/{id}/show', 'userController@show')->name('user.show');

Route::get('candidate','candidateController@index')->name('candidate.index');
Route::get('candidate/create','candidateController@create')->name('candidate.create');
Route::post('candidate/store','candidateController@store')->name('candidate.store');
Route::get('candidate/{id}/edit','candidateController@edit')->name('candidate.edit');
Route::put('candidate/{id}/update','candidateController@update')->name('candidate.update');
Route::delete('candidate/{id}/delete','candidateController@destroy')->name('candidate.delete');
Route::get('candidate/{id}/show', 'candidateController@show')->name('candidate.show');


Route::get('party','partyController@index')->name('party.index');
Route::get('party/create','partyController@create')->name('party.create');
Route::post('party/store','partyController@store')->name('party.store');
Route::get('party/{id}/edit','partyController@edit')->name('party.edit');
Route::put('party/{id}/update','partyController@update')->name('party.update');
Route::delete('party/{id}/delete','partyController@destroy')->name('party.delete');
Route::get('party/{id}/show', 'partyController@show')->name('party.show');


Route::get('seat','seatController@index')->name('seat.index');
Route::get('seat/create','seatController@create')->name('seat.create');
Route::post('seat/store','seatController@store')->name('seat.store');
Route::get('seat/{id}/edit','seatController@edit')->name('seat.edit');
Route::put('seat/{id}/update','seatController@update')->name('seat.update');
Route::delete('seat/{id}/delete','seatController@destroy')->name('seat.delete');
Route::get('seat/{id}/show', 'seatController@show')->name('seat.show');

Route::get('result/declare','VoteController@result')->name('result.declare');


});
Route::prefix('voter')->name('voter.')->middleware(['auth', 'users'])->group(function () {
    Route::get('/vote','VoteController@index')->name('vote.index');
    Route::put('/vote/{id}/store/','VoteController@store')->name('vote.store');
});




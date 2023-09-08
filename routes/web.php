<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;

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

Route::get('add-post', [AjaxController::class, 'myPost']);
Route::post('submit-post', [AjaxController::class, 'submitPost'])->name('postSubmit');


Route::get('rackspace', [AjaxController::class, 'callRackSpaceApi']);
Route::get('fetchemail', [AjaxController::class, 'fetchEmail']);

Route::get('makecall', [AjaxController::class, 'makeCall']);
Route::get('twowaycall', [AjaxController::class, 'twowaycall']);
Route::get('voicecall', [AjaxController::class, 'voicecall']);
Route::get('voicecallview', [AjaxController::class, 'voicecall_view']);
Route::get('directcall', [AjaxController::class, 'directcall']);

Route::get('handlekey', [AjaxController::class, 'handlekey']);
Route::get('outbound', [AjaxController::class, 'outbound']);


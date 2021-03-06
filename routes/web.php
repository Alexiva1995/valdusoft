<?php

use Illuminate\Support\Facades\Route;
use App\Models\Project;

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
    return view('landing.index');
})->name('landing');

Route::group(['prefix' => 'admin'], function(){
	Route::get('/', 'HomeController@admin')->name('admin.projects');
	Route::get('edit-project/{id}', 'HomeController@edit_project')->name('admin.edit-project');
    Route::post('store-project', 'HomeController@store_project')->name('admin.store-project');
	Route::post('update-project', 'HomeController@update_project')->name('admin.update-project');
});

Route::get('load-tab/{id}', 'HomeController@load_new_tab');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@landing')->name('landing');
Route::post('load-more-projects', 'HomeController@load_more_projects');
Route::get('load-new-tab/{tag_id}', 'HomeController@load_new_tab');
Route::post('/contact', 'HomeController@contactUs')->name('contact');
Route::get('project/{id}', 'HomeController@show_project');

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});
Route::get('/model/{id}', function($id) {
    $data = Project::find((int)$id);    
    return response()->json($data);
});
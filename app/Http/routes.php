<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'as' => 'index', 'uses' => 'MainController@index'
]);

Route::post('feedback', [
    'as' => 'feedback', 'uses' => 'MainController@feedback'
]);

Route::get('category/{id}', [
    'uses' => 'MainController@category','as' => 'category'
])->where(['id' => '[0-9]+']);

Route::post('catalog', [
    'uses' => 'MainController@catalog','as' => 'catalog'
]);

Route::get('about', function(){
    return view('about');
});

Route::get('files/{filename}/preview', function($filename){
    $path = storage_path('app/public/'.$filename);
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
});

Route::any('login', [
    'as' => 'login', 'uses' => 'MainController@login'
]);
Route::group(['middleware' => ['admin']], function () {
    Route::get('admin', [
        'as' => 'admin', 'uses' => 'MainController@admin'
    ]);
    Route::post('admin/add', [
        'as' => 'add', 'uses' => 'MainController@add'
    ]);
    Route::get('admin/delete/{id}', function($id)
    {
        \App\Products::destroy($id);
        return redirect('admin')->with('status', 'Удалено');
    });
});
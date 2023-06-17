<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    
    return redirect()->route('tasks.index');

});


Route::get('/tasks', function(){

    return view('tasks.index', ['tasks' => \App\Models\Task::all()]);

})->name('tasks.index');


Route::view('/tasks/create', 'tasks/create')->name('tasks.create');

Route::post('/tasks/store', function(Request $request){

    return dd($request->all());

})->name('tasks.store');

Route::get('/tasks/{id}', function($id){

    return view('tasks.show', ['tasks' => \App\Models\Task::findOrFail($id)]);

})->name('tasks.show');
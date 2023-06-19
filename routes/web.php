<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Task;

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


Route::get('/tasks/{id}/edit', function($id){

    return view('tasks.edit', ['tasks' => \App\Models\Task::findOrFail($id)]);

})->name('tasks.edit');



Route::get('/tasks/{id}', function($id){

    return view('tasks.show', ['tasks' => \App\Models\Task::findOrFail($id)]);

})->name('tasks.show');


Route::post('/tasks/store', function(Request $request){

    $data = $request->validate([

        'title'             => 'required|max:255',
        'description'       => 'required',
        'long_description'  => 'required'

    ]);


    $task = new Task;
    $task->title            = $data['title'];
    $task->description      = $data['description'];
    $task->long_description = $data['long_description'];
    
    $task->save();

    return redirect()->route('tasks.show', ['id' => $task->id])->with('success', 'Task Created Successfully!');

})->name('tasks.store');



Route::put('/tasks/update/{id}', function($id ,Request $request){

    $data = $request->validate([

        'title'             => 'required|max:255',
        'description'       => 'required',
        'long_description'  => 'required'

    ]);


    $task = Task::findOrFail($id);
    $task->title            = $data['title'];
    $task->description      = $data['description'];
    $task->long_description = $data['long_description'];
    
    $task->save();

    return redirect()->route('tasks.show', ['id' => $task->id])->with('success', 'Task Updated Successfully!');

})->name('tasks.update');


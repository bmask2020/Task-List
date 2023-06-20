<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Requests\taskrequest;

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


Route::get('/tasks/{task}/edit', function(Task $task){

    return view('tasks.edit', ['tasks' => $task]);

})->name('tasks.edit');



Route::get('/tasks/{task}', function(Task $task){

    return view('tasks.show', ['tasks' => $task]);

})->name('tasks.show');


Route::post('/tasks/store', function(taskrequest $request){

    $task = Task::create($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task Created Successfully!');

})->name('tasks.store');



Route::put('/tasks/update/{task}', function(Task $task ,taskrequest $request){

    $task->update($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task Updated Successfully!');

})->name('tasks.update');


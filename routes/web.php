<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

Route::get('/', function () {
    return view('welcome');
});

/*retrieves lahat ng route*, shortcut*/
Route::resource('notes', NoteController::class);

/*trad way of routing: specific example*/
/*Route:: delete('notes/{id}'), [NoteController::class, 'destroy'])->name('notes.delete');*/
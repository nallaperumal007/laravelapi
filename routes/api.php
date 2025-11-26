<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

Route::get('notes', [NoteController::class, 'index']);


Route::get('notes/{note}', [NoteController::class, 'show']);

Route::post('notes', [NoteController::class, 'store']);


Route::put('notes/{note}', [NoteController::class, 'update']);
Route::patch('notes/{note}', [NoteController::class, 'update']);

Route::delete('notes/{note}', [NoteController::class, 'destroy']);

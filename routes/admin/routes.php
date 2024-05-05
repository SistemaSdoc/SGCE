<?php
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\{AdminComponent,NoteManegementComponent};



Route::middleware(['auth','admin'])->group(function(){
Route::prefix('/admin')->group(function(){
Route::get('/inicio',AdminComponent::class)->name('admin.home');
Route::get('/gestao/notas/', NoteManegementComponent::class)->name('admin.note.management');
});
});
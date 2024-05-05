<?php
use Illuminate\Support\Facades\Route;
use App\Livewire\Directory\{HomeComponent,NotesComponent,CertifiedComponent,StudentComponent};
use App\Livewire\Directory\Component\{ShcoolComponent};



Route::middleware(['auth','directory'])->group(function(){
Route::prefix('/directoria')->group(function(){
Route::get('/inicio',HomeComponent::class)->name('directory.home');
Route::get("/consulta/notas/",NotesComponent::class)->name('directory.notes');
Route::get("/consulta/certificados/",CertifiedComponent::class)->name('directory.certifieds');
Route::get("/alunos" ,StudentComponent::class)->name('directory.students');
});
});






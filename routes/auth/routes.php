<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Login\{HomeComponent};
use App\Livewire\Auth\{AccountComponent};

Route::get('/', HomeComponent::class)->name('login');
Route::middleware(['auth'])->group(function(){
Route::prefix('/login')->group(function(){
Route::post('/auth',HomeComponent::class)->name('login.authentication');
});    

Route::prefix('/minha/conta/')->group(function(){
Route::get('/detalhes', AccountComponent::class)->name('user.account.details');
});

});


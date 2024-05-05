<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{UserCertifiedController};



Route::controller(UserCertifiedController::class)->group(function(){
    Route::get("/qr/code/{id}", 'show')->name('validation.certified');
});

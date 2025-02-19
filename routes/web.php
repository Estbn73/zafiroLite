<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/admin/login')->name('login');
    
Route::get('/prueba', function(){
    dd(User::find(1));
    
});
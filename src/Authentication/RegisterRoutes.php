<?php 

use Kompo\Library\Authentication\RegisterForm;

Route::middleware('guest')->group(function(){

    Route::get('register', RegisterForm::class)->name('register');

});
<?php 

use Kompo\Library\Authentication\RegisterForm;

Route::middleware('guest')->group(function(){

    Route::kompo('register', RegisterForm::class)->name('register');

});
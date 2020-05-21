<?php 

use Kompo\Library\Authentication\LoginForm;

Route::middleware('guest')->group(function(){

    Route::kompo('login', LoginForm::class)->name('login');

});
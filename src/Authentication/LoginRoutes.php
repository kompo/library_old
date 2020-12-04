<?php 

use Kompo\Library\Authentication\LoginForm;

Route::middleware('guest')->group(function(){

    Route::get('login', LoginForm::class)->name('login');

});
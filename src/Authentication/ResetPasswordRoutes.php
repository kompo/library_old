<?php 

use Kompo\Library\Authentication\ResetPassword;

Route::middleware('guest')->group(function(){

    Route::get('password/reset/{token}', ResetPassword::class)->name('password.reset');

});
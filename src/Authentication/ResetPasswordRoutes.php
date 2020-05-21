<?php 

use Kompo\Library\Authentication\ResetPassword;

Route::middleware('guest')->group(function(){

    Route::kompo('password/reset/{token}', ResetPassword::class)->name('password.reset');

});
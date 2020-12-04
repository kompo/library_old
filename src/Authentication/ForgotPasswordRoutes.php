<?php 

use Kompo\Library\Authentication\ForgotPasswordForm;

Route::middleware('guest')->group(function(){

    Route::get('password/request', ForgotPasswordForm::class)->name('password.request');

});
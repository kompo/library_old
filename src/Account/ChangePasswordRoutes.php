<?php 

use Kompo\Library\Account\ChangePasswordForm;

Route::middleware(['auth'])->group(function(){

    Route::layout('app-account')->group(function(){

        //...

        Route::kompo('account/change-password-form', ChangePasswordForm::class)
            ->name('account.change-password');

        //...
    });

});
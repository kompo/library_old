<?php 

use Kompo\Library\Account\{ChangeEmailForm, ChangePasswordForm, ChangeUsernameForm};

Route::middleware(['auth'])->group(function(){

    Route::layout('app-account')->group(function(){ //Change app-account with your desired template

        Route::get('account/change-password-form', ChangePasswordForm::class)
            ->name('account.change-password');

        Route::get('account/change-email-form', ChangeEmailForm::class)
           ->name('account.change-email');

        Route::get('account/change-username-form', ChangeUsernameForm::class)
            ->name('account.change-username');
    });

});
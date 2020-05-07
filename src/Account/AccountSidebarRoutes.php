<?php 

use Kompo\Library\Account\{ChangeEmailForm, ChangePasswordForm, ChangeUsernameForm};

Route::middleware(['auth'])->group(function(){

    Route::layout('app-account')->group(function(){ //Change app-account with your desired template

        Route::kompo('account/change-password-form', ChangePasswordForm::class)
            ->name('account.change-password');

        Route::kompo('account/change-email-form', ChangeEmailForm::class)
           ->name('account.change-email');

        Route::kompo('account/change-username-form', ChangeUsernameForm::class)
            ->name('account.change-username');
    });

});
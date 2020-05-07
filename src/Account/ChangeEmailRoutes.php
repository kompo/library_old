<?php 

use Kompo\Library\Account\ChangeEmailForm;

Route::middleware(['auth'])->group(function(){

    Route::layout('app-account')->group(function(){

        //...

        Route::kompo('account/change-email-form', ChangeEmailForm::class)
           ->name('account.change-email');

        //...
    });

});
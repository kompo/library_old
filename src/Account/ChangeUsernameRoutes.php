<?php 

use Kompo\Library\Account\ChangeUsernameForm;

Route::middleware(['auth'])->group(function(){

    Route::layout('app-account')->group(function(){

        //...

        Route::get('account/change-username-form', ChangeUsernameForm::class)
            ->name('account.change-username');

        //...
    });

});
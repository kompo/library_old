<?php

use Kompo\Library\Forms\{AuthLoginForm, AuthRegisterForm, AuthInvitationForm, AuthForgotPasswordForm};

Route::middleware('web')->group(function(){


	Route::middleware('guest')->group(function(){

		Route::layout('kompo::app')->group(function(){

			//Route::kompo('login', AuthLoginForm::class)->name('login');

			//Registration by invitation
			//Route::kompo('register/{token}', AuthRegisterForm::class)->name('register');
			//Normal Registration
			//Route::kompo('register', AuthRegisterForm::class)->name('register');

			//Route::kompo('password/reset', AuthForgotPasswordForm::class)->name('password.request');
		});

	});

	Route::middleware(['auth','verified'])->group(function(){

		Route::layout('kompo-library::app-account')->group(function(){

			//Route::kompo('invite-form', AuthInvitationForm::class)->name('invite-form');

			/* Pick and choose
			Route::kompo('profile/update', ProfileUpdateForm::class)
				->name('profile.update');

			Route::kompo('account/change-name-form', AccountChangeNameForm::class)
    			->name('account.change-name');

			Route::kompo('account/change-email-form', AccountChangeEmailForm::class)
    			->name('account.change-email');

    		Route::kompo('account/change-password-form', AccountChangePasswordForm::class)
    			->name('account.change-password');
    		*/
		});
	});

});

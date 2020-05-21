<?php

return [

	'socialites' => [
        //'facebook', 'twitter', 'google', 'linkedin'
    ],

    'user_has_profile' => env('USER_HAS_PROFILE', false),

    'registration_by_invitation' => env('REGISTRATION_BY_INVITATION', false),

    'permissions_and_roles' => env('PERMISSIONS_AND_ROLES', true), //true by default

];
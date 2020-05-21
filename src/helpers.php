<?php 

if (! function_exists('isAdmin')) {
	function isAdmin()
	{
		return isAuth() && auth()->user()->hasRole('admin|super-admin');
	}
}

if (! function_exists('isAuth')) {
	function isAuth()
	{
		return auth()->check();
	}
}
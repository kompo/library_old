<?php 

Route::get('http-route/{parameter}', function(){ 
   return 'GET HTTP route response with parameter: '.request('parameter').' and payload: '.request('payload'); 
});
Route::post('http-route/{parameter}', function(){ 
   return 'POST HTTP route response with parameter: '.request('parameter').' and payload: '.request('payload');
});
Route::put('http-route/{parameter}', function(){ 
   return 'PUT HTTP route response with parameter: '.request('parameter').' and payload: '.request('payload');
});
Route::delete('http-route/{parameter}', function(){ 
   return 'success';
});
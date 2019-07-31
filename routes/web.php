<?php


Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
Route::get('control_admin', 'DashboardController@control_admin')->name('control_admin');
Route::get('pago_admin', 'DashboardController@pago_admin')->name('pago_admin');

//Login - loguot
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//Registro
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register')->name('register');

Route::get('pendiente', 'DashboardController@pendiente')->name('pendiente');

//Usuarios
Route::resource('user','UserController');

// API
Route::get('getControl/{id}', 'ControlController@getControl')->name('getControl');


Route::get('getPagos/{id}/{porcent}', 'PagoController@getPagos')->name('getPagos');


//prestamos
Route::resource('cliente','ClienteController');
Route::resource('control','ControlController');
Route::resource('pago','PagoController');
Route::resource('report','ReportController');

Route::delete('eliminarcontrol/{monto}', 'DashboardController@eliminarcontrol')->name('eliminarcontrol.destroy');

Route::get('limpiarClientes/{id}', 'ClienteController@limpiarClientes')->name('limpiarClientes');

//Limpiar los clientes que ya depositaron
Route::patch('limpiar_cliente/{id}', 'ControlController@limpiar_cliente')->name('limpiar_cliente');

//Cierre
Route::get('cierre', 'CierreController@index')->name('cierre');
Route::post('cierre', 'CierreController@store')->name('cierre.store');
Route::get('cierre/{monto}/edit', 'CierreController@edit')->name('cierre.edit');
Route::patch('cierre/{monto}', 'CierreController@update')->name('cierre.update');
Route::delete('cierre/{monto}', 'CierreController@destroy')->name('cierre.destroy');

//Nomina
Route::get('nomina', 'NominaController@index')->name('nomina');
Route::post('nomina', 'NominaController@store')->name('nomina.store');

//resetear contraseña
Route::get('cambioclaveform', 'DashboardController@cambioclaveform')->name('cambioclaveform.update');
// Route::get('password/request', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');

Route::post('cambioclave/{empleado}', 'DashboardController@cambioclave')->name('cambioclave');
Route::post('reporte/', 'DashboardController@reporte')->name('reporte');

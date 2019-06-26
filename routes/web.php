<?php
Route::get('/', function () { return redirect('/admin/home'); });

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/calendar', 'Admin\SystemCalendarController@index'); 
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::resource('issues', 'Admin\IssuesController');
    Route::post('issues_mass_destroy', ['uses' => 'Admin\IssuesController@massDestroy', 'as' => 'issues.mass_destroy']);
    Route::get('clients/gmail/{id}','Admin\ClientsController@gmail')->name('clients.gmail');
    Route::resource('clients', 'Admin\ClientsController');
    Route::resource('clients', 'Admin\ClientsController');
    Route::post('clients_mass_destroy', ['uses' => 'Admin\ClientsController@massDestroy', 'as' => 'clients.mass_destroy']);
    Route::get('compids/gmail/{id}','Admin\CompIdsController@gmail')->name('compids.gmail');
    Route::resource('compids', 'Admin\CompIdsController');
    Route::post('compids_mass_destroy', ['uses' => 'Admin\CompIdsController@massDestroy', 'as' => 'compids.mass_destroy']);
    Route::resource('cemails', 'Admin\CemailsController');
    Route::post('cemails_mass_destroy', ['uses' => 'Admin\CemailsController@massDestroy', 'as' => 'cemails.mass_destroy']);
    Route::get('archives', ['uses' => 'Admin\CemailsController@archives', 'as' => 'cemails.archives']);
    Route::get('restore/{id}', ['uses' => 'Admin\CemailsController@restore', 'as' => 'cemails.restore']);
    Route::get('cemails_ar/{id}', ['uses' => 'Admin\CemailsController@viewArchive', 'as' => 'cemails.cemails_ar']);
    Route::delete('permanentDelete/{id}', ['uses' => 'Admin\CemailsController@permanentDelete', 'as' => 'cemails.permanentDelete']);
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('user_actions', 'Admin\UserActionsController');
 
});

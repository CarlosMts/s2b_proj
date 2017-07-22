<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect' ] ], function()
{
	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/


	Route::get('/', 'HomeController@index')->name('home');

	Auth::routes();

	//Route::get('/home', 'HomeController@index');

	Route::get('profile', 'UserController@profile')->name('profile');
	Route::post('profile', 'UserController@update_avatar')->name('profile');

	Route::get('/login/{provider}', 'Auth\RegisterController@redirectToProvider');
	Route::get('/login/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');

	

	Route::get('/search', 'SpaceController@findSpaces')->name('search');

	Route::group(['prefix' => 'admin',  'middleware' => ['App\Http\Middleware\Adminmiddleware']], function () {
                // Routes for only admins  
				 Route::get('/', function () {
			     	return view('admin.admin_home');
				 })->name('admin');

				Route::resource('spacetype', 'Admin\SpaceTypeController');
				Route::resource('/checklist', 'Admin\ChecklistController');
				Route::post('/checklist/{id}', 'Admin\ChecklistController@update');

				Route::get('/refreshChecklistTable', 'Admin\ChecklistController@refreshChecklistTable')->name('refreshChecklistTable');

				Route::resource('/spacetypechecklist', 'Admin\SpaceTypeChecklistController');

				Route::get('refreshSpaceTypeChecklistTable/{itemID}', 'Admin\SpaceTypeChecklistController@refreshSpaceTypeChecklistTable')->name('refreshSpaceTypeChecklistTable');

				Route::get('/review-spaces', 'SpaceController@listSpacesForReview')->name('reviewspaces');
				Route::get('/preview-spaces/{ID}', 'SpaceController@adminSpacePreview')->name('previewspaces');
				Route::put('/accept-space/{ID}', 'SpaceController@acceptSpace')->name('acceptspace');

				
                 
   	});

	Route::group(['middleware' => ['auth']], function()
	{
	    Route::resource('space', 'SpaceController');
	    Route::post('uploadPhotos', 'SpaceController@uploadFiles'); 
	    Route::get('/myspaces', 'SpaceController@listOwnedSpaces')->name('myspaces');

	});

	Route::get('showCheckList/{itemID}', 'SpaceController@showCheckList')->name('showCheckList');

	

});



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
	// Homepage
	Route::get('/', 'HomeController@index')->name('home');

	Auth::routes();


	Route::get('profile', 'UserController@profile')->name('profile');
	Route::post('profile', 'UserController@update_avatar')->name('profile');

	Route::get('/login/{provider}', 'Auth\RegisterController@redirectToProvider');
	Route::get('/login/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');

	// Search form submit with City name and Space Type
	Route::get('/search/{city}/{type}', 'SpaceController@findSpaces')->name('search');
	// Refresh local pinpoints
	Route::get('maprefresh', 'SpaceController@refreshSearchMap')->name('maprefresh');

	Route::get('faqs', function(){
	    return View('menu_bar_faqs'); // Your Blade template name
	})->name('faqs');

	Route::get('contacts', function(){
	    return View('menu_bar_contacts'); // Your Blade template name
	})->name('contacts');

	// Admin only pages
	Route::group(['prefix' => 'admin',  'middleware' => ['App\Http\Middleware\Adminmiddleware']], function () {
                // Admin home page
				Route::get('/', function () {
			     	return view('admin.admin_home');
				})->name('admin');

				// Add spacetype
				Route::resource('spacetype', 'Admin\SpaceTypeController');
				// Add checklist
				Route::resource('/checklist', 'Admin\ChecklistController');
				Route::post('/checklist/{id}', 'Admin\ChecklistController@update');
				Route::get('/refreshChecklistTable', 'Admin\ChecklistController@refreshChecklistTable')->name('refreshChecklistTable');
				Route::resource('/spacetypechecklist', 'Admin\SpaceTypeChecklistController');
				Route::get('refreshSpaceTypeChecklistTable/{itemID}', 'Admin\SpaceTypeChecklistController@refreshSpaceTypeChecklistTable')->name('refreshSpaceTypeChecklistTable');

				// Spaces for review
				Route::get('/review-spaces', 'SpaceController@listSpacesForReview')->name('reviewspaces');
				Route::put('/accept-space/{ID}', 'SpaceController@acceptSpace')->name('acceptspace');

				// Page to search by person name or space
				Route::any('/admin-search', 'SpaceController@adminSearch')->name('admin-search');
                 
   	});

	Route::group(['middleware' => ['auth']], function()
	{
	    Route::resource('space', 'SpaceController');
	    Route::resource('reservation', 'ReservationController');
	    Route::get('/chat', 'ReservationController@reservationMessagesUserList')->name('chat');
	    Route::get('message/{id}', 'ReservationController@chatHistory');
	    Route::post('writeMessage', 'ReservationController@writeMessage');
	    Route::patch('space-update/{ID}', 'SpaceController@update')->name('space-update');
	    Route::post('uploadPhotos', 'SpaceController@uploadFiles'); 
	    Route::get('/myspaces', 'SpaceController@listOwnedSpaces')->name('myspaces');
	    Route::get('reservations', 'ReservationController@showUserReservations')->name('reservations');
	    Route::get('space-reservations', 'ReservationController@showSpaceReservations')->name('space-reservations');

	});

	Route::get('showCheckList/{itemID}', 'SpaceController@showCheckList')->name('showCheckList');
	Route::get('showSpaceCheckList/{spaceID}/{typeID}', 'SpaceController@showSpaceCheckList')->name('showSpaceCheckList');

	

});



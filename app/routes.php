<?php
Route::get('/', array(
    'as' => 'home',
    'uses' => 'HomeController@home'
));

/*
 * | Autheticated group
 */
Route::group(array('before' => 'auth'), function() {
      /*
     * | Sign out (GET)
     */

    Route::get('/account/sign-out',array(
        'as' => 'account-sign-out',
        'uses' => 'AccountController@getSignOut'
    ));

    Route::group(array('before' => 'not_admin'), function() {

        Route::get('admin/users', array(
            'as' => 'admin-users',
            'uses' => 'AdminController@showUsers'
        ));

        Route::get('admin/add-moderator/{id}', array(
            'as' => 'admin-add_moderator',
            'uses' => 'AdminController@addModerator'
        ));

        Route::get('admin/remove-moderator/{id}', array(
            'as' => 'admin-remove_moderator',
            'uses' => 'AdminController@removeModerator'
        ));

    });

});
/*
 * | Unautheticated group
 */
Route::group(array('before' => 'guest'), function() {

   /*
 * | CSRF protection group
 */
    Route::group(array('before' => 'csrf'), function() {
        /*
        Create account (POST)
        */
            Route::post('/account/create/', array(
                'as' => 'account-create-post',
                'uses' =>'AccountController@postCreate'
            ));
        });

        /*
          Sign in (Post)
          */
        Route::post('/account/sign-in/', array(
            'as' => 'account-sign-in-post',
            'uses' =>'AccountController@postSignIn'
        ));
        /*
        Sign in (GET)
        */
        Route::get('/account/sign-in/', array(
            'as' => 'account-sign-in',
            'uses' =>'AccountController@getSignIn'
        ));
    /*
    Create account (GET)
    */
    Route::get('/account/create/', array(
        'as' => 'account-create',
        'uses' =>'AccountController@getCreate'
    ));

    /*
     Activate account
     */
    Route::get('account/activate/{code}', array(
        'as' => 'account-activate',
        'uses' => 'AccountController@getActivate'
    ));

});

// connect with corresponding model.
Route::model('publisher', 'Publisher');
//route for index page, call index method of controller
Route::get('/publisher', 'PublisherController@index');
//route for create publisher page.
Route::get('/publisher/create', 'PublisherController@create');
//route for edit publisher page.
Route::get('/publisher/edit/{publisher}', 'PublisherController@edit');
//route for delete publisher page
Route::get('/publisher/delete/{publisher}', 'PublisherController@delete');
// route for form submission call handleCreate method.
Route::post('/publisher/create', 'PublisherController@handleCreate');
//route to handle edit form submission
Route::post('/publisher/edit', 'PublisherController@handleEdit');
//route to handle delete.
Route::post('/publisher/delete', 'PublisherController@handleDelete');


// connect with corresponding model.
Route::model('developer', 'Developer');
//route for index page, call index method of controller
Route::get('/developer', 'DeveloperController@index');
//route for create developer page.
Route::get('/developer/create', 'DeveloperController@create');
//route for edit developer page.
Route::get('/developer/edit/{developer}', 'DeveloperController@edit');
//route for delete developer page
Route::get('/developer/delete/{developer}', 'DeveloperController@delete');
// route for form submission call handleCreate method.
Route::post('/developer/create', 'DeveloperController@handleCreate');
//route to handle edit form submission
Route::post('/developer/edit', 'DeveloperController@handleEdit');
//route to handle delete.
Route::post('/developer/delete', 'DeveloperController@handleDelete');


// connect with corresponding model.
Route::model('genre', 'Genre');
//route for index page, call index method of controller
Route::get('/genre', 'GenreController@index');
//route for create genre page.
Route::get('/genre/create', 'GenreController@create');
//route for edit genre page.
Route::get('/genre/edit/{genre}', 'GenreController@edit');
//route for delete genre page
Route::get('/genre/delete/{genre}', 'GenreController@delete');
// route for form submission call handleCreate method.
Route::post('/genre/create', 'GenreController@handleCreate');
//route to handle edit form submission
Route::post('/genre/edit', 'GenreController@handleEdit');
//route to handle delete.
Route::post('/genre/delete', 'GenreController@handleDelete');


// connect with corresponding model.
Route::model('requirement', 'Requirements');
//route for index page, call index method of controller
Route::get('/requirements', 'RequirementsController@index');
//route for create requirements page.
Route::get('/requirements/create', 'RequirementsController@create');
//route for edit requirements page.
Route::get('/requirements/edit/{requirement}', 'RequirementsController@edit');
//route for delete requirements page
Route::get('/requirements/delete/{requirement}', 'RequirementsController@delete');
// route for form submission call handleCreate method.
Route::post('/requirements/create', 'RequirementsController@handleCreate');
//route to handle edit form submission
Route::post('/requirements/edit', 'RequirementsController@handleEdit');
//route to handle delete.
Route::post('/requirements/delete', 'RequirementsController@handleDelete');

Route::get('game/show/{id}', array(
     'as' => 'game-show',
     'uses' => 'GameController@showGameInfo'
));

Route::resource('game', 'GameController');
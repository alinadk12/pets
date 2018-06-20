<?php

/*---------------------------------------аутентификация и регистрация-------------------------------------------------*/
Route::group(
    ['prefix' => 'register', 'namespace' => 'Auth'], function () {
        Route::get('/', ['as' => 'getRegister', 'uses' => 'RegisterController@getRegister']);
        Route::post('/', ['as' => 'postRegister', 'uses' => 'RegisterController@postRegister']);
    }
);
Route::post('/', ['as' => 'login', 'uses' => 'Auth\LoginController@authenticate']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');

Route::post('/change_lang', ['as' => 'changeLanguage', 'uses' => 'HomeController@change_lang']);

/*--------------------------------------------------пользователи------------------------------------------------------*/
Route::get('/profile/{id}', ['as' => 'showProfile', 'uses' => 'UserController@showProfile']);
Route::get('/delete/account/{id}', ['as' => 'deleteUser', 'uses' => 'UserController@deleteAccount']);
Route::group(
    ['prefix' => 'edit'], function () {
        Route::get('/{id}', ['as' => 'editProfile', 'uses' => 'UserController@edit']);
        Route::post('/{id}', ['as' => 'updateProfile', 'uses' => 'UserController@update']);
    }
);
Route::group(
    ['prefix' => '/changepassword'], function () {
        Route::get('/{id}', ['as' => 'getChangePassword', 'uses' => 'UserController@getChangePassword']);
        Route::post('/{id}', ['as' => 'postChangePassword', 'uses' => 'UserController@postChangePassword']);
    }
);
Route::group(
    ['prefix' => 'users', 'middleware' => 'role:Администратор'], function () {
        Route::get('/', ['as' => 'showUsers', 'uses' => 'UserController@showList']);
        Route::any('/editRoles', ['as' => 'editRoles', 'uses' => 'UserController@editRoles']);
        Route::get('delete/{id}', ['as' => 'deleteUser', 'uses' => 'UserController@delete']);
        Route::post('/set/role/{role_id}/user/{user_id}', ['uses' => 'UserController@setRole']);
        Route::get('/deleted', ['as' => 'deletedUsers', 'uses' => 'UserController@showDeleted']);
        Route::get('/restore/{id}', ['as' => 'restoreUser', 'uses' => 'UserController@restore']);
    }
);

/*-----------------------------------------------главная страница-----------------------------------------------------*/
Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);
//Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/', function () {
    redirect('http://http://tabletka.tomsk.ru');
});

/*-------------------------------------------------------породы-------------------------------------------------------*/
Route::group(
    ['prefix' => 'breeds'], function () {
        Route::get('/', ['as' => 'breeds', 'uses' => 'BreedsController@showAll']);
        Route::get('/terrier', ['as' => 'breedTerrier', 'uses' => 'BreedsController@showTerrier']);
        Route::get('/beagle', ['as' => 'breedBeagle', 'uses' => 'BreedsController@showBeagle']);
        Route::get('/goldenretriever', ['as' => 'breedGoldenRetriever', 'uses' => 'BreedsController@showGoldenRetriever']);
        Route::get('/chihuahua', ['as' => 'breedChihuahua', 'uses' => 'BreedsController@showChihuahua']);
    }
);

/*-------------------------------------------------------собаки-------------------------------------------------------*/
Route::group(
    ['prefix' => 'dogs'], function () {
        Route::group(
            ['middleware' => 'role:Сотрудник'], function () {
                Route::get('/edit/{id}', ['as' => 'editDog', 'uses' => 'DogsController@edit']);
                Route::post('/update/{id}', ['as' => 'updateDog', 'uses' => 'DogsController@update']);
                Route::get('/delete/{id}', ['as' => 'deleteDog', 'uses' => 'DogsController@delete']);
                Route::get('/create', ['as' => 'createDog', 'uses' => 'DogsController@create']);
                Route::post('/store', ['as' => 'storeDog', 'uses' => 'DogsController@store']);
            }
        );
        Route::group(
            ['middleware' => 'role:Администратор'], function () {
                Route::get('deleted', ['as' => 'deletedDogs', 'uses' => 'DogsController@showDeleted']);
                Route::get('restore/{id}', ['as' => 'restoreDog', 'uses' => 'DogsController@restore']);
                Route::get('forcedelete/{id}', ['as' => 'forceDeleteDog', 'uses' => 'DogsController@forceDeleted']);
            }
        );
        Route::get('/', ['as' => 'dogs', 'uses' => 'DogsController@showAll']);
        Route::get('/terrier', ['as' => 'dogTerrier', 'uses' => 'DogsController@showTerriers']);
        Route::get('/beagle', ['as' => 'dogBeagle', 'uses' => 'DogsController@showBeagles']);
        Route::get('/goldenretriever', ['as' => 'dogGoldenRetriever', 'uses' => 'DogsController@showGoldenRetrievers']);
        Route::get('/chihuahua', ['as' => 'dogChihuahua', 'uses' => 'DogsController@showChihuahua']);
    }
);

/*-------------------------------------------------------товары-------------------------------------------------------*/
Route::group(
    ['prefix' => 'goods'], function () {
        Route::group(
            ['middleware' => 'role:Сотрудник'], function () {
                Route::get('/create', ['as' => 'createGood', 'uses' => 'GoodsController@create']);
                Route::post('/store', ['as' => 'storeGood', 'uses' => 'GoodsController@store']);
                Route::get('/edit/{id}', ['as' => 'editGood', 'uses' => 'GoodsController@edit']);
                Route::post('/update/{id}', ['as' => 'updateGood', 'uses' => 'GoodsController@update']);
                Route::get('/delete/{id}', ['as' => 'deleteGood', 'uses' => 'GoodsController@delete']);
                Route::get('/sell/{id?}', ['as' => 'getSellGood', 'uses' => 'GoodsController@getSell']);
                Route::post('/postSell', ['as' => 'postSellGood', 'uses' => 'GoodsController@postSell']);
            }
        );
        Route::group(
            ['middleware' => 'role:Администратор'], function () {
                Route::get('deleted', ['as' => 'deletedGoods', 'uses' => 'GoodsController@showDeleted']);
                Route::get('restore/{id}', ['as' => 'restoreGood', 'uses' => 'GoodsController@restore']);
                Route::get('forcedelete/{id}', ['as' => 'forceDeleteGood', 'uses' => 'GoodsController@forceDeleted']);
            }
        );
        Route::get('/', ['as' => 'goods', 'uses' => 'GoodsController@showAll']);
        Route::get('/feed', ['as' => 'goodsFeed', 'uses' => 'GoodsController@showFeed']);
        Route::get('/bowls', ['as' => 'goodsBowls', 'uses' => 'GoodsController@showBowls']);
        Route::get('/toys', ['as' => 'goodsToys', 'uses' => 'GoodsController@showToys']);
        Route::get('/accessories', ['as' => 'goodsAccessories', 'uses' => 'GoodsController@showAccessories']);
        Route::get('/carriers', ['as' => 'goodsCarriers', 'uses' => 'GoodsController@showCarriers']);
    }
);

/*---------------------------------------------------------щенки------------------------------------------------------*/
Route::group(
    ['prefix' => 'puppies'], function () {
        Route::group(
            ['middleware' => 'role:Сотрудник'], function () {
                Route::get('/edit/{id}', ['as' => 'editPuppy', 'uses' => 'PuppiesController@edit']);
                Route::post('/update/{id}', ['as' => 'updatePuppy', 'uses' => 'PuppiesController@update']);
                Route::get('/delete/{id}', ['as' => 'deletePuppy', 'uses' => 'PuppiesController@delete']);
                Route::get('/create', ['as' => 'createPuppy', 'uses' => 'PuppiesController@create']);
                Route::post('/store', ['as' => 'storePuppy', 'uses' => 'PuppiesController@store']);
                Route::get('/forSale', ['as' => 'puppiesForSale', 'uses' => 'PuppiesController@forSale']);
                Route::get('/sold', ['as' => 'puppiesSold', 'uses' => 'PuppiesController@sold']);
                Route::get('/sell/{id?}', ['as' => 'getSellPuppy', 'uses' => 'PuppiesController@getSell']);
                Route::post('/postSell', ['as' => 'postSellPuppy', 'uses' => 'PuppiesController@postSell']);
            }
        );
        Route::group(
            ['middleware' => 'role:Администратор'], function () {
                Route::get('/deleted', ['as' => 'deletedPuppies', 'uses' => 'PuppiesController@showDeleted']);
                Route::get('restore/{id}', ['as' => 'restorePuppy', 'uses' => 'PuppiesController@restore']);
                Route::get('forcedelete/{id}', ['as' => 'forceDeletePuppy', 'uses' => 'PuppiesController@forceDeleted']);
            }
        );
        Route::get('/', ['as' => 'puppies', 'uses' => 'PuppiesController@showAll']);
        Route::get('/terrier', ['as' => 'puppiesTerrier', 'uses' => 'PuppiesController@showTerriers']);
        Route::get('/beagle', ['as' => 'puppiesBeagle', 'uses' => 'PuppiesController@showBeagles']);
        Route::get('/goldenretriever', ['as' => 'puppiesGoldenRetriever', 'uses' => 'PuppiesController@showGoldenRetrievers']);
        Route::get('/chihuahua', ['as' => 'puppiesChihuahua', 'uses' => 'PuppiesController@showChihuahua']);
    }
);

/*-------------------------------------------------------отзывы-------------------------------------------------------*/
Route::group(
    ['prefix' => 'reviews'], function () {
        Route::group(
            ['middleware' => 'role:Администратор'], function () {
                Route::get('admin/{id?}', ['as' => 'allReviews', 'uses' => 'ReviewsController@showAll']);
                Route::get('publish/{id}', ['as' => 'publishReview', 'uses' => 'ReviewsController@publish']);
                Route::get('deleted', ['as' => 'deletedReviews', 'uses' => 'ReviewsController@showDeleted']);
                Route::get('restore/{id}', ['as' => 'restoreReview', 'uses' => 'ReviewsController@restore']);
                Route::get('forcedelete/{id}', ['as' => 'forceDeleteReview', 'uses' => 'ReviewsController@forceDelete']);
            }
        );
        Route::get('delete/{id}', ['as' => 'deleteReview', 'uses' => 'ReviewsController@delete']);
        Route::get('/{id?}', ['as' => 'getReviews', 'uses' => 'ReviewsController@show']);
        Route::post('/', ['as' => 'postReviews', 'uses' => 'ReviewsController@store'])->middleware('role:Пользователь');
        Route::get('/edit/{id}', ['as' => 'editReview', 'uses' => 'ReviewsController@edit'])->middleware('role:Пользователь');
        Route::post('/update', ['as' => 'updateReview', 'uses' => 'ReviewsController@update'])->middleware('role:Пользователь');
    }
);

/*--------------------------------------------------запросы на щенков-------------------------------------------------*/
Route::group(
    ['prefix' => 'request', 'middleware' => 'role:Сотрудник'], function () {
        Route::get('/showAll', ['as' => 'showAllRequests', 'uses' => 'RequestController@showAll']);
        Route::get('/showNoReply', ['as' => 'showNoReplyRequests', 'uses' => 'RequestController@showNoReply']);
        Route::get('/showReply', ['as' => 'showReplyRequests', 'uses' => 'RequestController@showReply']);
        Route::any('/reply/{id?}', ['as' => 'replyRequests', 'uses' => 'RequestController@reply']);
    }
);

Route::group(
    ['prefix' => 'request', 'middleware' => 'role:Пользователь'], function () {
        Route::get('/{id}', ['as' => 'getRequest', 'uses' => 'RequestController@create']);
        Route::post('/', ['as' => 'postRequest', 'uses' => 'RequestController@store']);
    }
);

/*-------------------------------------------------------новости------------------------------------------------------*/
Route::group(
    ['prefix' => 'news'], function () {
        Route::group(
            ['middleware' => 'role:Сотрудник'], function () {
                Route::get('/create', ['as' => 'createNew', 'uses' => 'NewsController@create']);
                Route::post('/store', ['as' => 'storeNew', 'uses' => 'NewsController@store']);
                Route::get('/edit/{id}', ['as' => 'editNew', 'uses' => 'NewsController@edit']);
                Route::post('/update/{id}', ['as' => 'updateNew', 'uses' => 'NewsController@update']);
                Route::get('/delete/{id}', ['as' => 'deleteNew', 'uses' => 'NewsController@delete']);
            }
        );
        Route::group(
            ['middleware' => 'role:Администратор'], function () {
                Route::get('deleted', ['as' => 'deletedNews', 'uses' => 'NewsController@showDeleted']);
                Route::get('restore/{id}', ['as' => 'restoreNew', 'uses' => 'NewsController@restore']);
                Route::get('forcedelete/{id}', ['as' => 'forceDeleteNew', 'uses' => 'NewsController@forceDelete']);
            }
        );
        Route::get('/', ['as' => 'newsAll', 'uses' => 'NewsController@showAll']);
        Route::get('/{id}', ['as' => 'new', 'uses' => 'NewsController@show']);
    }
);

/*-----------------------------------------------------контакты-------------------------------------------------------*/
Route::get('/contacts', ['as' => 'contacts', 'uses' => 'ContactsController@show']);

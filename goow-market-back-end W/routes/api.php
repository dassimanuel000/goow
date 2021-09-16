<?php

Route::namespace('Api')->group(function () {
    Route::post('auth/register', 'Auth\AuthController@register');
    Route::post('auth/login', 'Auth\AuthController@login');
    Route::post('auth/password/create', 'Auth\ForgetPasswordController@create');
    Route::post('auth/password/reset', 'Auth\ForgetPasswordController@reset');
    Route::post('auth/register-merchant', 'Auth\AuthController@registerMerchantUser');
    Route::post('merchant-profiles/password', 'MerchantProfileController@updatePassword');

    Route::get('cities', 'CityController@index');
    Route::get('cities/search', 'CityController@search');
    Route::get('cities/city', 'CityController@getCity');
    Route::get('city', 'CityController@get');
    Route::get('product-suggestions','ProductSuggestionController@index');
    Route::get('product-suggestions/search', 'ProductSuggestionController@search');
    Route::get('units', 'UnitController@index');
    Route::apiResource('markets', 'MarketController')->only('index', 'show');
    Route::apiResource('activities', 'ActivityController')->only('index');
    Route::apiResource('merchants', 'MerchantController')->only('index', 'show');
    Route::apiResource('shops', 'ShopController')->only('index');
    Route::apiResource('favoriteMarkets','MarketUserLikeController')->only('index');
    Route::apiResource('contact','ContactController')->only('store');

    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('auth/user', 'Auth\AuthController@user');
        Route::post('auth/logout', 'Auth\AuthController@logout');
        Route::apiResource('verification', 'Auth\VerificationController')->only('store', 'show');
        Route::put('users/info', 'UserController@updateInfo');
        Route::put('users/password', 'UserController@updatePassword');
        Route::put('users/address/{address}', 'UserController@updateAddress');
        Route::get('users/address', 'UserController@getAddress');
        Route::post('users/address', 'UserController@storeAddress');
        Route::apiResource('payment-cards', 'PaymentCardController')->only('index', 'update');
        Route::apiResource('orders', 'OrderController')->only('index', 'update');
        Route::apiResource('checkout', 'CheckoutController')->only('store');
        Route::apiResource('reviews', 'ReviewController')->only('store');
        Route::post('merchant-profiles/status', 'MerchantProfileController@updateStatus');
        Route::post('merchant-profiles/image', 'MerchantProfileController@updateImage');
        Route::post('product/image', 'ProductController@storeImage');
        Route::get('merchant-profiles/orders', 'MerchantProfileController@getOrders');
        Route::post('merchant-profiles/working-times', 'MerchantProfileController@workingTimes');
        Route::post('merchant-profiles/description', 'MerchantProfileController@updateDescription');
        Route::post('market-profiles/description', 'MarketProfileController@updateDescription');
        Route::post('market-profiles/image', 'MarketProfileController@updateImage');
        Route::post('market-profiles/working-times', 'MarketProfileController@workingTimes');


        Route::get('my-market', 'MarketController@myMarket');
        Route::apiResource('merchants', 'MerchantController')->only('update');
        Route::apiResource('events', 'EventController');
        Route::apiResource('products', 'ProductController');
        Route::apiResource('products-category', 'ProductCategoryController');
        Route::put('products-category', 'ProductCategoryController@updateAll');
        Route::get('liked-markets', 'MarketUserLikeController@likedMarkets');
        Route::get('liked-clients', 'MarketUserLikeController@likedClients');
        Route::get('merchant-liked-clients', 'MerchantUserLikeController@likedClients');
        Route::post('client-mail', 'FavoriteClientMailController@send');
        Route::post('markets/{market}', 'MarketUserLikeController@like');
        Route::get('liked-merchants', 'MerchantUserLikeController@likedMerchants');
        Route::post('merchants/{merchant}', 'MerchantUserLikeController@like');
        Route::post('stripe/account-link', 'StripeController@storeAccountLink');
        Route::post('stripe/bank-account', 'StripeController@storeBankAccount');
        Route::post('stripe/payment-cards', 'StripeController@storePaymentCard');
        Route::delete('stripe/payment-cards/{stripe_card_id}', 'StripeController@deletePaymentCard');
        Route::get('stripe/payment-cards', 'StripeController@getPaymentCards');
        Route::get('stripe/payment-cards/default', 'StripeController@getPaymentCard');
        Route::post('stripe/setup-intent', 'StripeController@setupIntent');
        Route::post('stripe/payment-intent', 'StripeController@createPaymentIntent');
    });
});


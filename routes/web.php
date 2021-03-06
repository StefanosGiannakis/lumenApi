<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });

$router->get('/', ['uses' => 'ExampleController@loginPage']);
$router->group(['prefix' => 'api','middleware'=>'auth'], function () use ($router) {
    $router->get('coupons',  ['uses' => 'CouponController@showAllCoupons']); // Done    
  
    $router->get('coupons/{id}', ['uses' => 'CouponController@showOneCoupon']); // Done
  
    $router->post('coupons/create', ['uses' => 'CouponController@create']);
  
    $router->put('coupons/{id}', ['uses' => 'CouponController@update']);
  
    $router->delete('coupons/{id}', ['uses' => 'CouponController@delete']); // Done
});
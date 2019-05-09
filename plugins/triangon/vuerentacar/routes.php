<?php

use Triangon\Vuerentacar\Models\Vehicle;


Route::get('vehicles', function() {
    $vehicles = Vehicle::all();
    return $vehicles;
});

Route::get('/', function () {
        // $user = BackendAuth::getUser();
        // if(!$user)
        //     return Redirect::to('/backend');
        // else
        dump('routes');
        return (new Cms\Classes\Controller)->render('/home');
})->middleware('web');
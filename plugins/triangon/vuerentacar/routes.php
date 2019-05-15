<?php

use Triangon\Vuerentacar\Models\Vehicle;
use Triangon\Vuerentacar\Models\Location;


Route::get('vehicles', function() {
    $vehicles = Vehicle::with(['image','locations'])->get();
    return $vehicles;
});

Route::get('vehicles/filter/{id}', function($id) {
    $vehicles = Vehicle::wherehas('locations', function($query) use($id) {
        $query->where ('id', '=', $id);
    })->get();
    return $vehicles;
});

Route::get('locations', function() {
    $locations = Location::all();
    return $locations;
});

Route::get('locations/list', function() {
    $locations = Location::all();

    foreach ($locations as $key => $location) {
        $location['label'] = $location['title'];
        $location['value'] = $location['id'];
        unset($location['title']);
        unset($location['id']);
        unset($location['slug ']);
    }
    return $locations;
});



// Route::get('/', function () {
//         // $user = BackendAuth::getUser();
//         // if(!$user)
//         //     return Redirect::to('/backend');
//         // else
//         dump('routes');
//         return (new Cms\Classes\Controller)->render('/home');
// })->middleware('web');
<?php

use Triangon\Vuerentacar\Models\Vehicle;
use Triangon\Vuerentacar\Models\Location;
use Triangon\Vuerentacar\Models\Reservation;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

Route::middleware(['api'])->group(function () {
    Route::get('vehicles', function() {
        $vehicles = Vehicle::with(['image','locations'])->get();
        return $vehicles;
    });

    Route::get('vehicles/filter/{id}', function($id) {
        $vehicles = Vehicle::wherehas('locations', function($query) use($id) {
            $query->where ('id', '=', $id);
        })->with(['image','locations'])->get();
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
});


Route::middleware(['api','jwt.auth'])->group(function () {
    Route::post('create-reservation', function (Request $request) {
        $reservation = new Reservation;
        $reservation->user_id = $request->user_id;
        $reservation->vehicle_id = $request->vehicle_id;
        $file = new System\Models\File;
        $file->data = $request->files->get('fileupload1');
        $file->is_public = true;
        //$file->title = 'testdddddddf';
        $result = $file->save();
        $reservation->save();
        $reservation->fileupload1()->add($file);
        return response()->json('Reservation Created!');
    });
});



// Route::get('/', function () {
//         // $user = BackendAuth::getUser();
//         // if(!$user)
//         //     return Redirect::to('/backend');
//         // else
//         dump('routes');
//         return (new Cms\Classes\Controller)->render('/home');
// })->middleware('web');
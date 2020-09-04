<?php namespace Triangon\Vuerentacar\Models;

use Model;

/**
 * Model
 */
class Vehicle extends Model
{
    use \October\Rain\Database\Traits\Validation;
    //use \October\Rain\Database\Traits\Sortable;

    protected $jsonable = ['repeater'];
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'triangon_vuerentacar_vehicles';

    //relations
    public $belongsToMany = [
         'locations' => [
             'Triangon\Vuerentacar\Models\Location',
             'table' => 'triangon_vuerentacar_vehicles_locations',
             'order' => 'title'
         ]
    ];

    public $attachOne = [
        'image' => '\System\Models\File',
    ];

    public $attachMany = [
        'fileupload1' => '\System\Models\File',
    ];
    
    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}

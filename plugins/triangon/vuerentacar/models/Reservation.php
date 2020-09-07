<?php namespace Triangon\Vuerentacar\Models;

use Model;

/**
 * Model
 */
class Reservation extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $belongsTo = [
        'vehicle' => 'Triangon\Vuerentacar\Models\Vehicle',
        'user' => 'Rainlab\User\Models\User'
    ];
    
    /**
     * @var string The database table used by the model.
     */
    public $table = 'triangon_vuerentacar_reservations';

    public $attachOne = [
        'fileupload1' => '\System\Models\File',
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}

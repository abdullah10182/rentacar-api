<?php namespace Triangon\Vuerentacar\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTriangonVuerentacarReservations extends Migration
{
    public function up()
    {
        Schema::create('triangon_vuerentacar_reservations', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('vehicle_id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('triangon_vuerentacar_reservations');
    }
}

<?php namespace Triangon\Vuerentacar\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTriangonVuerentacarLocations extends Migration
{
    public function up()
    {
        Schema::create('triangon_vuerentacar_locations', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('triangon_vuerentacar_locations');
    }
}

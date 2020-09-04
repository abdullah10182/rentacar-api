<?php namespace Triangon\Vuerentacar\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateTriangonVuerentacarVehicles2 extends Migration
{
    public function up()
    {
        Schema::table('triangon_vuerentacar_vehicles', function($table)
        {
            $table->string('repeater')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('triangon_vuerentacar_vehicles', function($table)
        {
            $table->dropColumn('repeater');
        });
    }
}

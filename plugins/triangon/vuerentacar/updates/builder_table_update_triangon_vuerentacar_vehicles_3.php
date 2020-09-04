<?php namespace Triangon\Vuerentacar\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateTriangonVuerentacarVehicles3 extends Migration
{
    public function up()
    {
        Schema::table('triangon_vuerentacar_vehicles', function($table)
        {
            $table->boolean('available');
        });
    }
    
    public function down()
    {
        Schema::table('triangon_vuerentacar_vehicles', function($table)
        {
            $table->dropColumn('available');
        });
    }
}

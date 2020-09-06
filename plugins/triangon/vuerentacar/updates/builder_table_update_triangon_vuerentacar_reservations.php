<?php namespace Triangon\Vuerentacar\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateTriangonVuerentacarReservations extends Migration
{
    public function up()
    {
        Schema::table('triangon_vuerentacar_reservations', function($table)
        {
            $table->string('vehicle');
        });
    }
    
    public function down()
    {
        Schema::table('triangon_vuerentacar_reservations', function($table)
        {
            $table->dropColumn('vehicle');
        });
    }
}

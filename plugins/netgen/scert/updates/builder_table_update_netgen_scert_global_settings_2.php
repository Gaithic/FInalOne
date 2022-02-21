<?php namespace Netgen\Scert\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNetgenScertGlobalSettings2 extends Migration
{
    public function up()
    {
        Schema::table('netgen_scert_global_settings', function($table)
        {
            $table->text('header')->nullable();
            $table->text('left_header')->nullable();
            $table->text('right_header')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('netgen_scert_global_settings', function($table)
        {
            $table->dropColumn('header');
            $table->dropColumn('left_header');
            $table->dropColumn('right_header');
        });
    }
}

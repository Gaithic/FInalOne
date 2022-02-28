<?php namespace Netgen\Scert\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNetgenScertGlobalSettings12 extends Migration
{
    public function up()
    {
        Schema::table('netgen_scert_global_settings', function($table)
        {
            $table->text('contact_us')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('netgen_scert_global_settings', function($table)
        {
            $table->dropColumn('contact_us');
        });
    }
}

<?php namespace Netgen\Scert\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNetgenScertGlobalSettings14 extends Migration
{
    public function up()
    {
        Schema::table('netgen_scert_global_settings', function($table)
        {
            $table->text('contact_email')->nullable()->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('netgen_scert_global_settings', function($table)
        {
            $table->text('contact_email')->nullable(false)->default('null')->change();
        });
    }
}

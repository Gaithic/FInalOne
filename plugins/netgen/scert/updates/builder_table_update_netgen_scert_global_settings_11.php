<?php namespace Netgen\Scert\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNetgenScertGlobalSettings11 extends Migration
{
    public function up()
    {
        Schema::table('netgen_scert_global_settings', function($table)
        {
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('netgen_scert_global_settings', function($table)
        {
            $table->dropColumn('facebook_url');
            $table->dropColumn('twitter_url');
        });
    }
}

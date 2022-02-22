<?php namespace Netgen\Scert\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNetgenScertAnnouncements extends Migration
{
    public function up()
    {
        Schema::table('netgen_scert_announcements', function($table)
        {
            $table->text('titile');
            $table->text('slug');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('netgen_scert_announcements', function($table)
        {
            $table->dropColumn('titile');
            $table->dropColumn('slug');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
    }
}

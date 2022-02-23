<?php namespace Netgen\Scert\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNetgenScertAnnouncements5 extends Migration
{
    public function up()
    {
        Schema::table('netgen_scert_announcements', function($table)
        {
            $table->renameColumn('titile', 'title');
        });
    }
    
    public function down()
    {
        Schema::table('netgen_scert_announcements', function($table)
        {
            $table->renameColumn('title', 'titile');
        });
    }
}

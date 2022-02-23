<?php namespace Netgen\Scert\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNetgenScertAnnouncements2 extends Migration
{
    public function up()
    {
        Schema::table('netgen_scert_announcements', function($table)
        {
            $table->boolean('is_open_file')->default(0);
            $table->text('description')->nullable();
            $table->string('date')->default(date("Y-m-d H:i:s"));
            $table->dropColumn('announcement');
        });
    }
    
    public function down()
    {
        Schema::table('netgen_scert_announcements', function($table)
        {
            $table->dropColumn('is_open_file');
            $table->dropColumn('description');
            $table->dropColumn('date');
            $table->text('announcement');
        });
    }
}

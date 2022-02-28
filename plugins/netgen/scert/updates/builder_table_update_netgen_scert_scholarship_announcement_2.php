<?php namespace Netgen\Scert\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNetgenScertScholarshipAnnouncement2 extends Migration
{
    public function up()
    {
        Schema::table('netgen_scert_scholarship_announcement', function($table)
        {
            $table->integer('category_id')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('netgen_scert_scholarship_announcement', function($table)
        {
            $table->dropColumn('category_id');
        });
    }
}

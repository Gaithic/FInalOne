<?php namespace Netgen\Scert\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNetgenScertScholarshipAnnouncement extends Migration
{
    public function up()
    {
        Schema::rename('netgen_scert_ntse', 'netgen_scert_scholarship_announcement');
    }
    
    public function down()
    {
        Schema::rename('netgen_scert_scholarship_announcement', 'netgen_scert_ntse');
    }
}

<?php namespace Netgen\Scert\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNetgenScertScholarshipAnnouncements extends Migration
{
    public function up()
    {
        Schema::rename('netgen_scert_scholarship_examinations', 'netgen_scert_scholarship_announcements');
    }
    
    public function down()
    {
        Schema::rename('netgen_scert_scholarship_announcements', 'netgen_scert_scholarship_examinations');
    }
}

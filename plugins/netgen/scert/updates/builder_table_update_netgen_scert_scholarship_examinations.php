<?php namespace Netgen\Scert\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNetgenScertScholarshipExaminations extends Migration
{
    public function up()
    {
        Schema::rename('netgen_scert_scholarship_announcement', 'netgen_scert_scholarship_examinations');
    }
    
    public function down()
    {
        Schema::rename('netgen_scert_scholarship_examinations', 'netgen_scert_scholarship_announcement');
    }
}

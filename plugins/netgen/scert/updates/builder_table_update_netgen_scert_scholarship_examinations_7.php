<?php namespace Netgen\Scert\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNetgenScertScholarshipExaminations7 extends Migration
{
    public function up()
    {
        Schema::table('netgen_scert_scholarship_examinations', function($table)
        {
            $table->boolean('edit_slug')->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('netgen_scert_scholarship_examinations', function($table)
        {
            $table->dropColumn('edit_slug');
        });
    }
}

<?php namespace Netgen\Scert\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNetgenScertScholarshipExaminations2 extends Migration
{
    public function up()
    {
        Schema::table('netgen_scert_scholarship_examinations', function($table)
        {
            $table->string('is_open_file')->nullable(false)->unsigned(false)->default('null')->change();
        });
    }
    
    public function down()
    {
        Schema::table('netgen_scert_scholarship_examinations', function($table)
        {
            $table->boolean('is_open_file')->nullable(false)->unsigned(false)->default(0)->change();
        });
    }
}

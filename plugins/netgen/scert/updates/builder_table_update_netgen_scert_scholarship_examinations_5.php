<?php namespace Netgen\Scert\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNetgenScertScholarshipExaminations5 extends Migration
{
    public function up()
    {
        Schema::table('netgen_scert_scholarship_examinations', function($table)
        {
            $table->smallInteger('is_open_file')->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('netgen_scert_scholarship_examinations', function($table)
        {
            $table->string('is_open_file', 191)->nullable(false)->unsigned(false)->default('null')->change();
        });
    }
}

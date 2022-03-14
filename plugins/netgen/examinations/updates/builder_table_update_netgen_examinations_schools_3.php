<?php namespace Netgen\Examinations\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNetgenExaminationsSchools3 extends Migration
{
    public function up()
    {
        Schema::table('netgen_examinations_schools', function($table)
        {
            $table->integer('district_id')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('netgen_examinations_schools', function($table)
        {
            $table->dropColumn('district_id');
        });
    }
}

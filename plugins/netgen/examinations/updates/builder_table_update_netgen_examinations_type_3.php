<?php namespace Netgen\Examinations\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNetgenExaminationsType3 extends Migration
{
    public function up()
    {
        Schema::table('netgen_examinations_type', function($table)
        {
            $table->boolean('is_examination')->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('netgen_examinations_type', function($table)
        {
            $table->dropColumn('is_examination');
        });
    }
}

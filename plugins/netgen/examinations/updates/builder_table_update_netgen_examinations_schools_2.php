<?php namespace Netgen\Examinations\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNetgenExaminationsSchools2 extends Migration
{
    public function up()
    {
        Schema::table('netgen_examinations_schools', function($table)
        {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('netgen_examinations_schools', function($table)
        {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
    }
}

<?php namespace Netgen\Examinations\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNetgenExaminationsSchools extends Migration
{
    public function up()
    {
        Schema::table('netgen_examinations_schools', function($table)
        {
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('netgen_examinations_schools', function($table)
        {
            $table->dropColumn('deleted_at');
        });
    }
}

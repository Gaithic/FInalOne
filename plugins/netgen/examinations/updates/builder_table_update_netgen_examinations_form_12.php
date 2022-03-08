<?php namespace Netgen\Examinations\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNetgenExaminationsForm12 extends Migration
{
    public function up()
    {
        Schema::table('netgen_examinations_form', function($table)
        {
            $table->string('email')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('netgen_examinations_form', function($table)
        {
            $table->dropColumn('email');
        });
    }
}

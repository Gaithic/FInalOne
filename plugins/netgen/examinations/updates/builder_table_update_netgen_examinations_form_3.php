<?php namespace Netgen\Examinations\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNetgenExaminationsForm3 extends Migration
{
    public function up()
    {
        Schema::table('netgen_examinations_form', function($table)
        {
            $table->integer('school_type_id')->nullable();
            $table->integer('examination_type_id')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('netgen_examinations_form', function($table)
        {
            $table->dropColumn('school_type_id');
            $table->dropColumn('examination_type_id');
        });
    }
}

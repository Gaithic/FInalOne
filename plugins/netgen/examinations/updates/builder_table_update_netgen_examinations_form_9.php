<?php namespace Netgen\Examinations\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNetgenExaminationsForm9 extends Migration
{
    public function up()
    {
        Schema::table('netgen_examinations_form', function($table)
        {
            $table->renameColumn('examination_type_id', 'examination_id');
        });
    }
    
    public function down()
    {
        Schema::table('netgen_examinations_form', function($table)
        {
            $table->renameColumn('examination_id', 'examination_type_id');
        });
    }
}

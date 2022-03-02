<?php namespace Netgen\Examinations\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNetgenExaminationsForm2 extends Migration
{
    public function up()
    {
        Schema::table('netgen_examinations_form', function($table)
        {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('netgen_examinations_form', function($table)
        {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
    }
}

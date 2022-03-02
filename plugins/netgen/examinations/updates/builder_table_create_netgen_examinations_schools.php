<?php namespace Netgen\Examinations\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateNetgenExaminationsSchools extends Migration
{
    public function up()
    {
        Schema::create('netgen_examinations_schools', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('udise_code');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('netgen_examinations_schools');
    }
}

<?php namespace Netgen\Examinations\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateNetgenExaminationsForm extends Migration
{
    public function up()
    {
        Schema::create('netgen_examinations_form', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('sex');
            $table->string('medium_of_examination');
            $table->string('mobile_number_of_parent');
            $table->integer('roll_number');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('netgen_examinations_form');
    }
}

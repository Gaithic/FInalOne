<?php namespace Netgen\Examinations\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateNetgenExaminationsType extends Migration
{
    public function up()
    {
        Schema::create('netgen_examinations_type', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('netgen_examinations_type');
    }
}

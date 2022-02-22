<?php namespace Netgen\Scert\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateNetgenScertScholarship extends Migration
{
    public function up()
    {
        Schema::create('netgen_scert_scholarship', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('image');
            $table->string('title');
            $table->text('description');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('netgen_scert_scholarship');
    }
}

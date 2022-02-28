<?php namespace Netgen\Scert\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateNetgenScertNmms extends Migration
{
    public function up()
    {
        Schema::create('netgen_scert_nmms', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->text('title');
            $table->text('slug');
            $table->boolean('is_open_file')->default(0);
            $table->text('description')->nullable();
            $table->string('file')->nullable();
            $table->date('date');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('netgen_scert_nmms');
    }
}

<?php namespace Netgen\Scert\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateNetgenScertSlider extends Migration
{
    public function up()
    {
        Schema::create('netgen_scert_slider', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('slide_title');
            $table->string('slide_image');
            $table->text('slide_description')->nullable();
            $table->text('text_color')->nullable();
            $table->string('slide_image_mobile');
            $table->integer('sort_order')->default(1);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('netgen_scert_slider');
    }
}

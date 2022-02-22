<?php namespace Netgen\Scert\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateNetgenScertAnnouncements extends Migration
{
    public function up()
    {
        Schema::create('netgen_scert_announcements', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->text('announcement');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('netgen_scert_announcements');
    }
}

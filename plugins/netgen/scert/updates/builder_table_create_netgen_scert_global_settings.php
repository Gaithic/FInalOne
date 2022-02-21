<?php namespace Netgen\Scert\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateNetgenScertGlobalSettings extends Migration
{
    public function up()
    {
        Schema::create('netgen_scert_global_settings', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->text('site_name')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('netgen_scert_global_settings');
    }
}

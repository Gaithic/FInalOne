<?php namespace Netgen\Scert\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateNetgenScertContactList extends Migration
{
    public function up()
    {
        Schema::create('netgen_scert_contact_list', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('designation');
            $table->string('phone_no');
            $table->string('email_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('netgen_scert_contact_list');
    }
}

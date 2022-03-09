<?php namespace Netgen\Scert\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteNetgenScertContactList extends Migration
{
    public function up()
    {
        Schema::dropIfExists('netgen_scert_contact_list');
    }
    
    public function down()
    {
        Schema::create('netgen_scert_contact_list', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name', 191);
            $table->string('designation', 191);
            $table->string('phone_no', 191);
            $table->string('email_id', 191);
            $table->integer('category_id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
}

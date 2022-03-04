<?php namespace Netgen\Contact\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateNetgenContactForm extends Migration
{
    public function up()
    {
        Schema::create('netgen_contact_form', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('email');
            $table->string('subject');
            $table->text('content');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('netgen_contact_form');
    }
}

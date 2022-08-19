<?php namespace Netgen\Registration\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateUsersTable extends Migration
{

    public function up()
    {
        Schema::table('users', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('user_id')->nullable();
            $table->string('fathername')->nullable();
            $table->string('mothername')->nullable();
            $table->string('academic_year')->nullable();
            $table->string('contact')->nullable();
            $table->string('gender')->nullable();
            $table->string('mobile')->nullable();
        });
    }
    public function down()
    {
        Schema::table('users', function($table)
                {
                $table->dropColumn([
                    'fathername',
                    'mothername',
                    'academic_year',
                    'contact',
                    'gender'
                ]);
        });
    }

}

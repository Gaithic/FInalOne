<?php namespace Netgen\Scert\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNetgenScertScholarship extends Migration
{
    public function up()
    {
        Schema::table('netgen_scert_scholarship', function($table)
        {
            $table->string('slug');
            $table->text('excerpt')->nullable();
            $table->date('date')->nullable();
            $table->integer('sort_order')->default(1);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->text('description')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('netgen_scert_scholarship', function($table)
        {
            $table->dropColumn('slug');
            $table->dropColumn('excerpt');
            $table->dropColumn('date');
            $table->dropColumn('sort_order');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->text('description')->nullable(false)->change();
        });
    }
}

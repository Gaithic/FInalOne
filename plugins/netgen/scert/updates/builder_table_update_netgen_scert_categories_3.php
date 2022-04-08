<?php namespace Netgen\Scert\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNetgenScertCategories3 extends Migration
{
    public function up()
    {
        Schema::table('netgen_scert_categories', function($table)
        {
            $table->text('description')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('netgen_scert_categories', function($table)
        {
            $table->dropColumn('description');
        });
    }
}

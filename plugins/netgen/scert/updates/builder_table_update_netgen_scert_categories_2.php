<?php namespace Netgen\Scert\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNetgenScertCategories2 extends Migration
{
    public function up()
    {
        Schema::table('netgen_scert_categories', function($table)
        {
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('netgen_scert_categories', function($table)
        {
            $table->dropColumn('deleted_at');
        });
    }
}

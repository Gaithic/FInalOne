<?php namespace Netgen\Scert\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNetgenScertContactList3 extends Migration
{
    public function up()
    {
        Schema::table('netgen_scert_contact_list', function($table)
        {
            $table->renameColumn('category_id', 'category');
        });
    }
    
    public function down()
    {
        Schema::table('netgen_scert_contact_list', function($table)
        {
            $table->renameColumn('category', 'category_id');
        });
    }
}

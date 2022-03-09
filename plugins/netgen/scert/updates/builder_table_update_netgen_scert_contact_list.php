<?php namespace Netgen\Scert\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNetgenScertContactList extends Migration
{
    public function up()
    {
        Schema::table('netgen_scert_contact_list', function($table)
        {
            $table->integer('category_id');
        });
    }
    
    public function down()
    {
        Schema::table('netgen_scert_contact_list', function($table)
        {
            $table->dropColumn('category_id');
        });
    }
}

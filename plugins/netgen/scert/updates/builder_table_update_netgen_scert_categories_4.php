<?php namespace Netgen\Scert\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNetgenScertCategories4 extends Migration
{
    public function up()
    {
        Schema::rename('netgen_scert_examination_types', 'netgen_scert_categories');
    }
    
    public function down()
    {
        Schema::rename('netgen_scert_categories', 'netgen_scert_examination_types');
    }
}

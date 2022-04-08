<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form_positions', function (Blueprint $table) {
            //
            if(!Schema::hasColumn('form_positions', 'requirements')){
                $table->longtext('requirements')->nullable()->after('fee');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('form_positions', function (Blueprint $table) {
            //
            if(Schema::hasColumn('form_positions', 'requirements')){
                $table->dropColumn('requirements');
            }
        });
    }
};

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
        Schema::table('applications', function (Blueprint $table) {
            //
            if(!Schema::hasColumn('applications', 'state_id')){
                $table->integer('state_id')->nullable()->after('date_of_birth');
                $table->integer('lga_id')->nullable()->after('date_of_birth');
                $table->string('ward')->nullable()->after('date_of_birth');
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
        Schema::table('applications', function (Blueprint $table) {
            //
            if(Schema::hasColumn('applications', 'state_id')){
                $table->dropColumn('state_id');
                $table->dropColumn('lga_id');
                $table->dropColumn('ward');
            }
        });
    }
};

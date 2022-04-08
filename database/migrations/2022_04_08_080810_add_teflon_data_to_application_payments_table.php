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
        Schema::table('application_payments', function (Blueprint $table) {
            //
            if(!Schema::hasColumn('application_payments', 'charge_id', 'charge_type')){
                $table->string('charge_id')->nullable()->after('currency');
                $table->string('charge_type')->nullable()->after('currency');
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
        Schema::table('application_payments', function (Blueprint $table) {
            //
            if(!Schema::hasColumn('application_payments', 'charge_id', 'charge_type')){
                $table->dropColumn('charge_id');
                $table->dropColumn('charge_type');
            }
        });
    }
};

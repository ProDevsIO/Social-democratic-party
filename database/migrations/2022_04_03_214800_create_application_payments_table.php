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
        Schema::create('application_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('application_id')->nullable();
            $table->double('price')->nullable();
            $table->decimal('amount_paid')->nullable();
            $table->integer('quantity')->default(1);
            $table->string('currency', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application_payments');
    }
};

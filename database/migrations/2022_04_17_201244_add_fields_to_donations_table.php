<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donations', function (Blueprint $table) {
            //
            $table->string('type');
            $table->integer('amount');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->boolean('get_mail')->nullable();
            $table->boolean('get_sms')->nullable();
            $table->boolean('donor_wall')->nullable();
            $table->string('donor_wall_name')->nullable();
            $table->boolean('gift_add')->nullable();
            $table->integer('billing_id')->nullable();
            $table->string('payment_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('donations', function (Blueprint $table) {
            //
        });
    }
}

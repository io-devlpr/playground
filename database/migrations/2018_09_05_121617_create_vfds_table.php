<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVfdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vfds', function (Blueprint $table) {
            $table->increments('id');
            $table->string("serial");
            $table->string("machine_key")->unique();
            $table->unsignedInteger("company_link_id");    // foreign
            $table->ipAddress("locationRegistered");
            $table->boolean("is_activated");
            $table->dateTimeTz("activation_datetime");
            $table->boolean("is_blocked");
            $table->timestamps();

            // Set foreign key
            $table->foreign("company_link_id")
                  ->references("id")->on("company_tins")
                  ->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vfds');
    }
}

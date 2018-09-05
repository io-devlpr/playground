<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string("fname");
            $table->string("lname");
            $table->date("dob");
            $table->unsignedInteger("admin_id");
            $table->timestamps();

            $table->foreign("admin_id")
                ->references("id")->on("admins")
                ->onDelete("restrict")
                ->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins_details');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('applications', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->bigInteger('client_id');
            $table->string('name');
            $table->string('alias');
            $table->string('backend_path');
            $table->string('frontend_path');
            $table->string('icon');
            $table->unsignedInteger('sort');
            $table->tinyInteger('is_visible');
            $table->timestamps();

             $table->foreign('client_id')->references('id')->on('client_apps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

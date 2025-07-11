<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->bigInteger('application_id');
            $table->string('name');
            $table->string('alias');
            $table->string('backend_path');
            $table->string('frontend_path');
            $table->string('icon');
            $table->unsignedInteger('sort');
            $table->tinyInteger('is_visible');
            $table->timestamps();

            $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}

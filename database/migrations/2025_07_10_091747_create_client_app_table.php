<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientAppTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_app', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->string("app_name")->unique();
            $table->string("slug")->unique();
            $table->string('redirect_url');
            $table->unsignedInteger('oauth_client_id')->nullable();
            $table->timestamps();
            
            $table->foreign('oauth_client_id')->references('id')->on('oauth_clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_app');
    }
}

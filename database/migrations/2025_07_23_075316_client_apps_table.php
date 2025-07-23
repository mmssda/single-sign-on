<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClientAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('client_apps', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->uuid('owner_id');
            $table->string("app_name")->unique();
            $table->string("slug")->unique();
            $table->string('redirect_url'); // Redirect URI saat login
            $table->string("client_secret");  // Salin dari oauth_clients.secret
            $table->unsignedInteger('oauth_client_id')->nullable();
            $table->string("icon");
            $table->text('description')->nullable(); // Deskripsi aplikasi
            $table->boolean("is_active")->default(true); 
            $table->timestamps();
            
            $table->foreign('oauth_client_id')->references('id')->on('oauth_clients')->onDelete('cascade');
            $table->foreign('owner_id')->references('id')->on('users')->nullOnDelete(); // Kalau user dihapus, owner_id jadi null
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

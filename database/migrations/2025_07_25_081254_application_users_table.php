<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApplicationUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
           Schema::create('application_users', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->bigInteger('user_id');
            $table->bigInteger('client_id');
   
            $table->text('note')->nullable(); // Deskripsi aplikasi
            $table->boolean("is_active")->default(true); 
            $table->timestamps();
            
            $table->foreign('client_id')->references('id')->on('client_apps')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete(); // Kalau user dihapus, owner_id jadi null
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

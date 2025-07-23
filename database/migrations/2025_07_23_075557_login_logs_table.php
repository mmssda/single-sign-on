<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LoginLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('login_logs', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->uuid('user_id');
            $table->unsignedBigInteger('oauth_client_id');
            $table->ipAddress('ip_address');
            $table->text('user_agent')->nullable(); // ← simpan di sini
            $table->string('device')->nullable();   // ← parsed dari UA
            $table->timestamp('logged_in_at');
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('statecode',2)->nullable();
            $table->string('districtcode',3)->nullable();
            $table->string('officecode',3)->nullable();
            $table->string('usertypecode',3)->nullable();
            $table->string('userrole',1)->default(0); 
            $table->string('userid',7)->nullable();
            $table->string('name',100)->nullable();
            $table->string('email',100)->unique();
            $table->string('password',70);            
            $table->string('status',1)->default(0);            
            $table->timestamp('activationdate')->nullable();            
            $table->timestamp('deactivationdate')->nullable();            
            $table->timestamp('email_verified_at')->nullable();            
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};

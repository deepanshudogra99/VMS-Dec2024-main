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
        Schema::create('vc_mains', function (Blueprint $table) {
            $table->id();
            $table->string('vcid',60)->nullable();
            $table->string('name',70)->nullable();
            $table->string('designation',40)->nullable();
            $table->string('mobile',10)->nullable();
            $table->string('userid',length: 7)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vc_mains');
    }
};

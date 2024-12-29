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
        Schema::create('vc_masters', function (Blueprint $table) {
            $table->id();
            $table->string('statecode',2)->nullable();
            $table->string('districtcode',3)->nullable();
            $table->string('officecode',3)->nullable();
            $table->string('vcid',80)->nullable();
            $table->date('vcdate')->nullable();
            $table->string('purpose',255)->nullable();
            $table->time('timein')->nullable();
            $table->time('timeout')->nullable();
            $table->string('userid',7)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vc_masters');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        Schema::create('partnerships', function (BluePrint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->customTimestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('partnerships');
    }
};

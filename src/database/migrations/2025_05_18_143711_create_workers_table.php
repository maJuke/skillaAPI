<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('second_name')->nullable();
            $table->string('surname')->nullable(false);
            $table->string('phone')->nullable();
            $table->customTimestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('workers');
    }
};

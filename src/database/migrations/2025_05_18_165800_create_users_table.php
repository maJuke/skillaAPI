<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (BluePrint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('surname')->nullable(false);
            $table->foreignId('partnership_id')->constrained()->cascadeOnDelete();
            $table->customTimestamps();
        });

        Schema::create('sessions', function (BluePrint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void {
        Schema::dropIfExists('users');
        Schema::dropIfExists('sessions');
    }
};

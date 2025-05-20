<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('order_worker', function (Blueprint $table) {
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('worker_id')->constrained()->cascadeOnDelete();
            $table->integer('amount')->nullable(false);
            $table->customTimestamps();

            $table->primary(['order_id', 'worker_id']);
        });
    }

    public function down(): void {
        Schema::dropIfExists('order_worker');
    }
};

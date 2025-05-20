<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('worker_ex_order_type', function (Blueprint $table) {
            $table->foreignId('worker_id')->constrained()->cascadeOnDelete();
            $table->foreignId('type_id')->constrained('order_types')->cascadeOnDelete();
            $table->timestamps();

            $table->primary(['worker_id','type_id']);
        });
    }

    public function down(): void {
        Schema::dropIfExists('worker_ex_order_type');
    }
};

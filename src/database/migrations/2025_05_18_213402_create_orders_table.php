<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (BluePrint $table) {
            $table->id();
            $table->foreignId('type_id')->constrained('order_types')->cascadeOnDelete();
            $table->foreignId('partnership_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->text('description')->nullable();
            $table->date('date')->nullable(false);
            $table->string('address')->nullable();
            $table->integer('amount')->nullable();
            $table->tinyInteger('status')->nullable()->default(0);
            $table->customTimestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('orders');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('customer_groups', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->decimal('discount', 5, 2)->default(0);
            $table->string('is_default');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('customer_groups');
    }
};
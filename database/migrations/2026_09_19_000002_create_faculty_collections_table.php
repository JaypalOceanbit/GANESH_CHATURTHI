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
        Schema::create('faculty_collections', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('amount', 10, 2);
            $table->string('sponsor')->nullable();
            $table->date('collection_date')->nullable()->index();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculty_collections');
    }
};

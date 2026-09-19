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
        Schema::table('students_collections', function (Blueprint $table) {
            $table->boolean('is_group')->default(false)->after('amount');
            $table->string('group_members')->nullable()->after('is_group');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students_collections', function (Blueprint $table) {
            $table->dropColumn(['is_group', 'group_members']);
        });
    }
};

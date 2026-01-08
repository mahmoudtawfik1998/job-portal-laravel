<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

public function up(): void
{
    Schema::table('jobs', function (Blueprint $table) {
        $table->foreignId('category_id')
            ->nullable()
            ->after('description')
            ->constrained()
            ->onDelete('cascade');

        $table->dropColumn('category');
    });
}

public function down(): void
{
    Schema::table('jobs', function (Blueprint $table) {
        $table->string('category')->nullable();
        $table->dropForeign(['category_id']);
        $table->dropColumn('category_id');
    });
}
};

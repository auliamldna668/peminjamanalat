<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengembalians', function (Blueprint $table) {
            // tambah user_id
            $table->foreignId('user_id')
                ->after('id')
                ->constrained()
                ->onDelete('cascade');

            // tambah denda
            $table->integer('denda')->default(0)->after('user_id');
        });
    }

    public function down(): void
    {
        Schema::table('pengembalians', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id', 'denda']);
        });
    }
};
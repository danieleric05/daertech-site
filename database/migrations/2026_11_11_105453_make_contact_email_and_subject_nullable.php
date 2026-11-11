<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('contact_messages', function (Blueprint $table) {
            $table->string('email')->nullable()->change();
            $table->string('subject')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('contact_messages')->whereNull('email')->update(['email' => '']);
        DB::table('contact_messages')->whereNull('subject')->update(['subject' => '']);

        Schema::table('contact_messages', function (Blueprint $table) {
            $table->string('email')->nullable(false)->change();
            $table->string('subject')->nullable(false)->change();
        });
    }
};

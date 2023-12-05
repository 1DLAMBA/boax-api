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
        Schema::table('users', function (Blueprint $table) {
            $table->string('account_balance')->nullable()->after('state');
            $table->string('pin')->nullable()->after('state');
            $table->string('card_number')->nullable()->after('state');
            $table->string('cvv')->nullable()->after('state');
            $table->date('expiry')->nullable()->after('state');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

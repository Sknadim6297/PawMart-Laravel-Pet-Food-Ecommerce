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
        Schema::table('contact_settings', function (Blueprint $table) {
            $table->string('phone_number_2')->nullable()->after('phone_number');
            $table->string('working_hours_salt_lake')->nullable()->after('working_hours');
            $table->string('working_hours_chingrighata')->nullable()->after('working_hours_salt_lake');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_settings', function (Blueprint $table) {
            $table->dropColumn(['phone_number_2', 'working_hours_salt_lake', 'working_hours_chingrighata']);
        });
    }
};

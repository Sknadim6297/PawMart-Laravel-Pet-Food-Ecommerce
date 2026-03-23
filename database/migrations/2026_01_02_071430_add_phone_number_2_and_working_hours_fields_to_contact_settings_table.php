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
        $driver = \Illuminate\Support\Facades\DB::connection()->getDriverName();
        
        // Check which columns already exist
        if ($driver === 'sqlite') {
            $columns = \Illuminate\Support\Facades\DB::select("PRAGMA table_info(contact_settings)");
            $existingColumns = collect($columns)->pluck('name')->toArray();
        } else {
            $columns = \Illuminate\Support\Facades\DB::select('DESCRIBE contact_settings');
            $existingColumns = collect($columns)->pluck('Field')->toArray();
        }
        
        Schema::table('contact_settings', function (Blueprint $table) use ($existingColumns, $driver) {
            if (!in_array('phone_number_2', $existingColumns)) {
                if ($driver === 'sqlite') {
                    $table->string('phone_number_2')->nullable();
                } else {
                    $table->string('phone_number_2')->nullable()->after('phone_number');
                }
            }
            
            if (!in_array('working_hours_salt_lake', $existingColumns)) {
                if ($driver === 'sqlite') {
                    $table->string('working_hours_salt_lake')->nullable();
                } else {
                    $table->string('working_hours_salt_lake')->nullable()->after('working_hours');
                }
            }
            
            if (!in_array('working_hours_chingrighata', $existingColumns)) {
                if ($driver === 'sqlite') {
                    $table->string('working_hours_chingrighata')->nullable();
                } else {
                    $table->string('working_hours_chingrighata')->nullable()->after('working_hours_salt_lake');
                }
            }
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

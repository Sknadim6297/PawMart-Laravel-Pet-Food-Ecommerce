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

        if ($driver === 'sqlite') {
            $columns = \Illuminate\Support\Facades\DB::select('PRAGMA table_info(contact_settings)');
            $existingColumns = collect($columns)->pluck('name')->toArray();
        } else {
            $columns = \Illuminate\Support\Facades\DB::select('DESCRIBE contact_settings');
            $existingColumns = collect($columns)->pluck('Field')->toArray();
        }

        Schema::table('contact_settings', function (Blueprint $table) use ($existingColumns) {
            if (!in_array('additional_email_addresses', $existingColumns)) {
                $table->text('additional_email_addresses')->nullable();
            }

            if (!in_array('additional_phone_numbers', $existingColumns)) {
                $table->text('additional_phone_numbers')->nullable();
            }

            if (!in_array('additional_addresses', $existingColumns)) {
                $table->text('additional_addresses')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_settings', function (Blueprint $table) {
            $table->dropColumn([
                'additional_email_addresses',
                'additional_phone_numbers',
                'additional_addresses',
            ]);
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('welcome_sections', function (Blueprint $table) {
            // Add up to 2 service tiles (title, description, icon, link)
            if (!Schema::hasColumn('welcome_sections', 'service_title')) {
                $table->string('service_title')->nullable()->after('description');
            }
            if (!Schema::hasColumn('welcome_sections', 'service_description')) {
                $table->text('service_description')->nullable()->after('service_title');
            }
            if (!Schema::hasColumn('welcome_sections', 'service_icon')) {
                $table->string('service_icon')->nullable()->after('service_description');
            }
            if (!Schema::hasColumn('welcome_sections', 'service_link')) {
                $table->string('service_link')->nullable()->after('service_icon');
            }
            if (!Schema::hasColumn('welcome_sections', 'service2_title')) {
                $table->string('service2_title')->nullable()->after('service_link');
            }
            if (!Schema::hasColumn('welcome_sections', 'service2_description')) {
                $table->text('service2_description')->nullable()->after('service2_title');
            }
            if (!Schema::hasColumn('welcome_sections', 'service2_icon')) {
                $table->string('service2_icon')->nullable()->after('service2_description');
            }
            if (!Schema::hasColumn('welcome_sections', 'service2_link')) {
                $table->string('service2_link')->nullable()->after('service2_icon');
            }
        });
    }

    public function down(): void
    {
        Schema::table('welcome_sections', function (Blueprint $table) {
            foreach ([
                'service_title', 'service_description', 'service_icon', 'service_link',
                'service2_title', 'service2_description', 'service2_icon', 'service2_link',
            ] as $col) {
                if (Schema::hasColumn('welcome_sections', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};
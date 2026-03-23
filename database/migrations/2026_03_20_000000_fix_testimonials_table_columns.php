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
        if (!Schema::hasTable('testimonials')) {
            // If table doesn't exist, create it with the expected columns
            Schema::create('testimonials', function (Blueprint $table) {
                $table->id();
                $table->string('client_name')->nullable();
                $table->string('designation')->nullable();
                $table->text('message')->nullable();
                $table->string('image')->nullable();
                $table->unsignedTinyInteger('rating')->default(5);
                $table->integer('sort_order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
            return;
        }

        // Table exists; add missing columns safely
        Schema::table('testimonials', function (Blueprint $table) {
            if (!Schema::hasColumn('testimonials', 'client_name')) {
                $table->string('client_name')->nullable()->after('id');
            }
            if (!Schema::hasColumn('testimonials', 'designation')) {
                $table->string('designation')->nullable()->after('client_name');
            }
            if (!Schema::hasColumn('testimonials', 'message')) {
                $table->text('message')->nullable()->after('designation');
            }
            if (!Schema::hasColumn('testimonials', 'image')) {
                $table->string('image')->nullable()->after('message');
            }
            if (!Schema::hasColumn('testimonials', 'rating')) {
                $table->unsignedTinyInteger('rating')->default(5)->after('image');
            }
            if (!Schema::hasColumn('testimonials', 'sort_order')) {
                $table->integer('sort_order')->default(0)->after('rating');
            }
            if (!Schema::hasColumn('testimonials', 'is_active')) {
                $table->boolean('is_active')->default(true)->after('sort_order');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (!Schema::hasTable('testimonials')) {
            return;
        }

        Schema::table('testimonials', function (Blueprint $table) {
            if (Schema::hasColumn('testimonials', 'is_active')) {
                $table->dropColumn('is_active');
            }
            if (Schema::hasColumn('testimonials', 'sort_order')) {
                $table->dropColumn('sort_order');
            }
            if (Schema::hasColumn('testimonials', 'rating')) {
                $table->dropColumn('rating');
            }
            if (Schema::hasColumn('testimonials', 'image')) {
                $table->dropColumn('image');
            }
            if (Schema::hasColumn('testimonials', 'message')) {
                $table->dropColumn('message');
            }
            if (Schema::hasColumn('testimonials', 'designation')) {
                $table->dropColumn('designation');
            }
            if (Schema::hasColumn('testimonials', 'client_name')) {
                $table->dropColumn('client_name');
            }
        });
    }
};

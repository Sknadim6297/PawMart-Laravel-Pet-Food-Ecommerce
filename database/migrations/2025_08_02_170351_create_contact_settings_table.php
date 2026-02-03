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
        Schema::create('contact_settings', function (Blueprint $table) {
            $table->id();
            $table->string('page_title')->default('Contact Us');
            $table->text('page_subtitle')->nullable();
            $table->string('banner_image')->nullable();
            
            // Hero Section
            $table->string('hero_title')->default('We would love to hear from you.');
            $table->text('hero_description')->default('Expert Pet Care with a personal touch');
            
            // Contact Info Cards
            $table->string('email_title')->default('Email Us');
            $table->string('email_address')->default('info@animalpride.in');
            
            $table->string('phone_title')->default('Call Us');
            $table->string('phone_number')->default('7439767977');
            $table->string('phone_number_2')->nullable();
            $table->string('phone_subtitle')->default('Call Us');
            
            $table->string('hours_title')->default('Opening Hours');
            $table->string('working_hours_salt_lake')->nullable();
            $table->string('working_hours_chingrighata')->nullable();
            $table->string('working_hours')->default('SALT LAKE: 10.30 AM - 9.00 PM');
            $table->string('working_days')->default('CHINGRIGHATA: 9.00 AM - 10.00 PM');
            
            // Find Branch Section
            $table->string('branch_title')->default('Find a dog walker or pet care');
            $table->text('branch_description')->default('Place your trust in We Love Pets, an award-winning dog walking and pet care');
            $table->string('branch_placeholder')->default('Enter address or postcode...');
            
            // Office Locations
            $table->string('office1_title')->default('CLINIC & GROOMING CENTER:');
            $table->text('office1_address')->default('BE-10, SECTOR - I, SALT LAKE, KOLKATA - 700 064 (OPPOSITE SEN MAHASAY BUSSTOP)');
            
            $table->string('office2_title')->default('SALES OUTLET:');
            $table->text('office2_address')->default('Q - 424, SUKANTANAGAR, SALT LAKE, SECTOR - IV, KOLKATA - 700 106 (OPPOSITE UPCOMING CHINGRIGHATA METRO)');
            
            // Contact Form
            $table->string('form_title')->default('Book Your Place or Find out More');
            $table->text('form_textarea_placeholder')->default('Please let us know which day package you\'re interested');
            
            // Awards Section
            $table->string('awards_title')->default('Awards Winning Company');
            $table->boolean('show_awards')->default(true);
            
            // Meta
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_settings');
    }
};

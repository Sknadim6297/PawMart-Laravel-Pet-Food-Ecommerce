<?php

namespace Database\Seeders;

use App\Models\ContactSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSettingSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        ContactSetting::create([
            'page_title' => 'Contact Us',
            'page_subtitle' => 'Get in touch with our pet care experts',
            'hero_title' => 'We would love to hear from you.',
            'hero_description' => 'Expert Pet Care with a personal touch',
            'email_title' => 'Email Us',
            'email_address' => 'info@animalpride.in',
            'phone_title' => 'Call Us',
            'phone_number' => '7439767977',
            'phone_number_2' => '9748546599',
            'phone_subtitle' => 'Call Us',
            'hours_title' => 'Opening Hours',
            'working_hours_salt_lake' => '10.30 AM - 9.00 PM',
            'working_hours_chingrighata' => '9.00 AM - 10.00 PM',
            'working_hours' => 'SALT LAKE: 10.30 AM - 9.00 PM',
            'working_days' => 'CHINGRIGHATA: 9.00 AM - 10.00 PM',
            'branch_title' => 'Find a dog walker or pet care',
            'branch_description' => 'Place your trust in We Love Pets, an award-winning dog walking and pet care',
            'branch_placeholder' => 'Enter address or postcode...',
            'office1_title' => 'CLINIC & GROOMING CENTER:',
            'office1_address' => 'BE-10, SECTOR - I, SALT LAKE, KOLKATA - 700 064 (OPPOSITE SEN MAHASAY BUSSTOP)',
            'office2_title' => 'SALES OUTLET:',
            'office2_address' => 'Q - 424, SUKANTANAGAR, SALT LAKE, SECTOR - IV, KOLKATA - 700 106 (OPPOSITE UPCOMING CHINGRIGHATA METRO)',
            'form_title' => 'Book Your Place or Find out More',
            'form_textarea_placeholder' => 'Please let us know which day package you\'re interested',
            'awards_title' => 'Awards Winning Company',
            'show_awards' => true,
            'is_active' => true,
        ]);
    }
}

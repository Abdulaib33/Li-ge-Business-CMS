<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Page;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        $pages = [
            [
                'key' => 'home',
                'title' => 'Welcome',
                'body' => 'Edit this content from the admin panel.',
                'meta_title' => 'Home',
                'meta_description' => 'Home page description.',
                'is_published' => true,
            ],
            [
                'key' => 'about',
                'title' => 'About Us',
                'body' => 'Write your story here.',
                'meta_title' => 'About',
                'meta_description' => 'About page description.',
                'is_published' => true,
            ],
            [
                'key' => 'contact',
                'title' => 'Contact',
                'body' => 'You can contact us using the form below.',
                'meta_title' => 'Contact',
                'meta_description' => 'Contact page description.',
                'is_published' => true,
            ],
        ];

        foreach ($pages as $data) {
            Page::updateOrCreate(['key' => $data['key']], $data);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\ContactMessage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ContactMessageSeeder extends Seeder
{
    public function run(): void
    {
        $messages = [
            [
                'name' => 'Emma Laurent',
                'email' => 'emma.laurent@example.com',
                'phone' => '+32 470 11 22 33',
                'message' => 'Hello, I would like to get a quote for a small business website with a contact form and services page.',
                'created_at' => Carbon::now()->subDays(8),
                'updated_at' => Carbon::now()->subDays(8),
            ],
            [
                'name' => 'David Bernard',
                'email' => 'david.bernard@example.com',
                'phone' => '+32 471 22 33 44',
                'message' => 'Do you also provide website maintenance after launch?',
                'created_at' => Carbon::now()->subDays(7),
                'updated_at' => Carbon::now()->subDays(7),
            ],
            [
                'name' => 'Sophie Martin',
                'email' => 'sophie.martin@example.com',
                'phone' => null,
                'message' => 'I am interested in redesigning an outdated website for my local shop. Could we discuss this?',
                'created_at' => Carbon::now()->subDays(6),
                'updated_at' => Carbon::now()->subDays(6),
            ],
            [
                'name' => 'Lucas Dupont',
                'email' => 'lucas.dupont@example.com',
                'phone' => '+32 472 33 44 55',
                'message' => 'I need a simple CMS where I can edit my homepage, services, and blog posts without touching code.',
                'created_at' => Carbon::now()->subDays(5),
                'updated_at' => Carbon::now()->subDays(5),
            ],
            [
                'name' => 'Nina Moreau',
                'email' => 'nina.moreau@example.com',
                'phone' => null,
                'message' => 'Could you tell me your starting price for a professional portfolio website?',
                'created_at' => Carbon::now()->subDays(4),
                'updated_at' => Carbon::now()->subDays(4),
            ],
            [
                'name' => 'Karim El Mansouri',
                'email' => 'karim.elmansouri@example.com',
                'phone' => '+32 473 44 55 66',
                'message' => 'We are looking for a custom internal tool for appointment management. Is this something you build?',
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(2),
            ],
        ];

        foreach ($messages as $message) {
            ContactMessage::create($message);
        }
    }
}
<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Custom Website Development',
                'description' => 'Modern business websites built with performance, maintainability, and clean design in mind.',
                'price_text' => 'From €900',
                'sort_order' => 1,
                'is_published' => true,
            ],
            [
                'title' => 'Laravel Web Applications',
                'description' => 'Custom Laravel applications for internal tools, booking systems, dashboards, and client platforms.',
                'price_text' => 'From €1,500',
                'sort_order' => 2,
                'is_published' => true,
            ],
            [
                'title' => 'CMS Setup & Customization',
                'description' => 'Content-managed websites with easy editing for pages, blog posts, services, and media.',
                'price_text' => 'From €700',
                'sort_order' => 3,
                'is_published' => true,
            ],
            [
                'title' => 'Website Maintenance',
                'description' => 'Ongoing support, bug fixes, updates, and small improvements for existing websites.',
                'price_text' => 'From €80 / month',
                'sort_order' => 4,
                'is_published' => true,
            ],
            [
                'title' => 'Performance Optimization',
                'description' => 'Improve loading speed, structure, and reliability for business websites and web apps.',
                'price_text' => 'From €250',
                'sort_order' => 5,
                'is_published' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['title' => $service['title']],
                $service
            );
        }
    }
}
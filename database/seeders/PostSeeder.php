<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Why Every Small Business Needs a Modern Website',
                'slug' => 'why-every-small-business-needs-a-modern-website',
                'excerpt' => 'A modern website helps small businesses build trust, attract leads, and present their services clearly.',
                'body' => 'A strong website is often the first impression a potential customer has of a business. It should be clear, mobile-friendly, and easy to navigate. For small businesses, a modern website is not a luxury anymore — it is part of basic credibility.',
                'meta_title' => 'Why Small Businesses Need a Modern Website',
                'meta_description' => 'Discover why a modern website is essential for credibility, marketing, and growth for small businesses.',
                'published_at' => Carbon::now()->subDays(20),
                'is_published' => true,
            ],
            [
                'title' => '5 Signs Your Business Website Needs an Upgrade',
                'slug' => '5-signs-your-business-website-needs-an-upgrade',
                'excerpt' => 'Slow pages, outdated visuals, and poor mobile experience are strong signs your site needs improvement.',
                'body' => 'If your website feels outdated, loads slowly, or does not work well on mobile devices, it may be holding your business back. A redesign can improve trust, speed, and conversion.',
                'meta_title' => '5 Signs Your Website Needs an Upgrade',
                'meta_description' => 'Learn the main signs that show when a business website needs a redesign or technical upgrade.',
                'published_at' => Carbon::now()->subDays(15),
                'is_published' => true,
            ],
            [
                'title' => 'Laravel for Business Web Applications',
                'slug' => 'laravel-for-business-web-applications',
                'excerpt' => 'Laravel is a strong framework for custom web applications thanks to its structure, security, and speed of development.',
                'body' => 'Laravel provides a clean structure for building dashboards, booking systems, internal tools, and client platforms. It is a strong choice for maintainable business applications.',
                'meta_title' => 'Laravel for Business Web Apps',
                'meta_description' => 'Explore why Laravel is a strong framework for professional business web applications.',
                'published_at' => Carbon::now()->subDays(10),
                'is_published' => true,
            ],
            [
                'title' => 'How Better Contact Forms Improve Lead Quality',
                'slug' => 'how-better-contact-forms-improve-lead-quality',
                'excerpt' => 'A clear and simple contact form can improve communication and reduce low-quality inquiries.',
                'body' => 'Contact forms should be short, clear, and easy to use. Asking only useful questions helps improve the quality of incoming leads and keeps the experience frictionless.',
                'meta_title' => 'Better Contact Forms for Better Leads',
                'meta_description' => 'See how improving your contact form can increase better business inquiries and lead quality.',
                'published_at' => Carbon::now()->subDays(7),
                'is_published' => true,
            ],
            [
                'title' => 'The Value of Fast Loading Pages',
                'slug' => 'the-value-of-fast-loading-pages',
                'excerpt' => 'Website speed affects user trust, SEO, and conversion rates more than many businesses realize.',
                'body' => 'Fast websites feel more professional and keep users engaged. Improving performance can help both customer experience and search visibility.',
                'meta_title' => 'Why Fast Websites Matter',
                'meta_description' => 'Understand why fast loading pages matter for SEO, trust, and better user experience.',
                'published_at' => Carbon::now()->subDays(3),
                'is_published' => true,
            ],
        ];

        foreach ($posts as $post) {
            Post::updateOrCreate(
                ['slug' => $post['slug']],
                $post
            );
        }
    }
}
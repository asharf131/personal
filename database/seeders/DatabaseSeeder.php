<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Skill;
use App\Models\Language;
use App\Models\Project;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create Admin User
        if (!User::where('email', 'admin@gmail.com')->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'mobile' => '0590000000',
                'password' => bcrypt('12345678'),
            ]);
        }

        // 2. Seed Settings
        $settings = [
            'site_name' => 'Portfolio HMS',
            'site_email' => 'admin@gmail.com',
            'site_phone' => '+1 234 567 890',
            'site_address' => 'Gaza, Palestine',
            'facebook_link' => 'https://facebook.com/',
            'twitter_link' => 'https://twitter.com/',
            'linkedin_link' => 'https://linkedin.com/',
            'github_link' => 'https://github.com/',
            'about_summary' => 'I am a passionate Full-Stack Developer with experience in building modern web applications using Laravel, React, and Tailwind CSS.',
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        // 3. Seed Experiences
        Experience::create([
            'title' => 'Senior Web Developer',
            'company' => 'Tech Solutions',
            'location' => 'Remote',
            'start_date' => '2021-01-01',
            'description' => 'Working on high-performance web applications and leading the development team.',
        ]);

        Experience::create([
            'title' => 'Software Engineer',
            'company' => 'Innovate Hub',
            'location' => 'Gaza',
            'start_date' => '2019-06-01',
            'end_date' => '2020-12-31',
            'description' => 'Developed custom CRM systems and internal tools for various clients.',
        ]);

        // 4. Seed Educations
        Education::create([
            'college' => 'Islamic University of Gaza',
            'location' => 'Gaza',
            'degree' => 'Bachelor of Software Engineering',
            'start_date' => '2015-09-01',
            'end_date' => '2019-06-01',
            'description' => 'Studied core computer science principles and software development life cycles.',
        ]);

        // 5. Seed Skills
        $skills = ['Laravel', 'React.js', 'Tailwind CSS', 'MySQL', 'JavaScript', 'Git / GitHub'];
        foreach ($skills as $skill) {
            Skill::create(['title' => $skill]);
        }

        // 6. Seed Languages
        Language::create(['title' => 'Arabic']);
        Language::create(['title' => 'English']);

        // 7. Seed Projects
        Project::create([
            'title' => 'E-Commerce App',
            'description' => 'A complete online store with shopping cart and payment gateway.',
            'link' => 'https://github.com/',
        ]);

        Project::create([
            'title' => 'Social Media Dashboard',
            'description' => 'An analytics dashboard for social media management.',
            'link' => 'https://github.com/',
        ]);
    }
}

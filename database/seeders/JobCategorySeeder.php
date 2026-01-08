<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\Category;

class JobCategorySeeder extends Seeder
{
    public function run()
    {
        // جلب كل الكاتيجوريز
        $categories = Category::all()->keyBy('name');

        // نمشي على كل الوظائف
        Job::all()->each(function($job) use ($categories) {

            $title = strtolower($job->title);

            // تحديد الكاتيجوري حسب الاسم
            if (str_contains($title, 'marketing')) {
                $job->category_id = $categories['Marketing']->id ?? null;
            } elseif (str_contains($title, 'customer service')) {
                $job->category_id = $categories['Customer Service']->id ?? null;
            } elseif (str_contains($title, 'human resource')) {
                $job->category_id = $categories['Human Resource']->id ?? null;
            } elseif (str_contains($title, 'project management')) {
                $job->category_id = $categories['Project Management']->id ?? null;
            } elseif (str_contains($title, 'business development')) {
                $job->category_id = $categories['Business Development']->id ?? null;
            } elseif (str_contains($title, 'sales')) {
                $job->category_id = $categories['Sales & Communication']->id ?? null;
            } elseif (str_contains($title, 'teaching')) {
                $job->category_id = $categories['Teaching & Education']->id ?? null;
            } elseif (str_contains($title, 'design') || str_contains($title, 'product')) {
                $job->category_id = $categories['Design & Creative']->id ?? null;
            }

            $job->save();
        });

        $this->command->info('✅ All jobs have been linked to their categories!');
    }
}

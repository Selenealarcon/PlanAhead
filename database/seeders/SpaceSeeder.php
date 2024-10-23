<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SpaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('spaces')->insert([
            [
                'name' => 'English Project',
                'description' => 'Tasks and assignments related to the English language project.',
                // 'user_id' => 1,
                'photo' => 'English Project_photo.jpg',
                'wallpaper' => 'English Project_wallpaper.jpg'
            ],
        ]);
        DB::table('spaces')->insert([
            [
                'name' => 'Household Chores',
                'description' => 'List of pending household chores and tasks.',
                // 'user_id' => 2,
                'photo' => 'Household Chores_photo.png',
                'wallpaper' => 'Household Chores_wallpaper.jpg'
            ],
        ]);
        DB::table('spaces')->insert([
            [
                'name' => 'Pedraforca Excursion',
                'description' => 'Planning and organization for the upcoming excursion to Pedraforca.',
                // 'user_id' => 3,
                'wallpaper' => 'Pedraforca Excursion_wallpaper.jpg'
            ],
        ]);
        DB::table('spaces')->insert([
            [
                'name' => 'Taylor Swift Concert Trip',
                'description' => 'Organization of the trip and details for attending the Taylor Swift concert.',
                // 'user_id' => 4,
                'photo' => 'Taylor Swift Concert Trip_photo.jpg',
                'wallpaper' => 'Taylor Swift Concert Trip_wallpaper.png'
            ],
        ]);
        DB::table('spaces')->insert([
            [
                'name' => 'Work Project Tasks',
                'description' => 'Tasks and activities related to the ongoing project at work.',
                // 'user_id' => 5,
                'photo' => 'Work Project Tasks_photo.jpg',
                'wallpaper' => 'Work Project Tasks_wallpaper.jpg'
            ],
        ]);
        DB::table('spaces')->insert([
            [
                'name' => 'Exam Preparation',
                'description' => 'Study plan and review sessions for upcoming exams.',
                // 'user_id' => 6,
                'photo' => 'Exam Preparation_photo.jpg'
            ],
        ]);
        DB::table('spaces')->insert([
            [
                'name' => 'Outdoor Exercise Plan',
                'description' => 'Plan for outdoor exercises and recreational activities.',
                // 'user_id' => 1,
            ],
        ]);
        DB::table('spaces')->insert([
            [
                'name' => 'Weekly Shopping List',
                'description' => 'List of essential purchases to be made for the week.',
                // 'user_id' => 2,
                'photo' => 'Weekly Shopping List_photo.jpg',
                'wallpaper' => 'Weekly Shopping List_wallpaper.jpg'
            ],
        ]);
        DB::table('spaces')->insert([
            [
                'name' => 'Gardening Project Plan',
                'description' => 'Planning and tasks related to the ongoing gardening project.',
                // 'user_id' => 3,
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Cooking Classes Schedule',
                'description' => 'Schedule and organization for upcoming cooking classes.',
                // 'user_id' => 4,
                'wallpaper' => 'Cooking Classes Schedule_wallpaper.jpg'
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Party Preparations Checklist',
                'description' => 'Checklist and preparations for organizing the upcoming party.',
                // 'user_id' => 5,
                'wallpaper' => 'Party Preparations Checklist_wallpaper.jpg'
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Research Project Outline',
                'description' => 'Research plan and outline for the ongoing research project.',
                // 'user_id' => 6,
                'photo' => 'Research Project Outline_photo.jpeg'
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Paris Trip Itinerary',
                'description' => 'Detailed itinerary and plans for the upcoming trip to Paris.',
                // 'user_id' => 1,
                'photo' => 'Paris Trip Itinerary_photo.jpg',
                'wallpaper' => 'Paris Trip Itinerary_wallpaper.jpg'
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Marathon Training Program',
                'description' => 'Training program and schedule for preparing for the upcoming marathon.',
                // 'user_id' => 2,
                'photo' => 'Marathon Training Program_photo.jpg',
                'wallpaper' => 'Marathon Training Program_wallpaper.jpg'
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Home Renovation Tasks',
                'description' => 'Tasks and planning for the ongoing home renovation project.',
                // 'user_id' => 3,
                'photo' => 'Home Renovation Tasks_photo.jpg'
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Yoga Practice Schedule',
                'description' => 'Schedule and organization for regular yoga practice sessions.',
                // 'user_id' => 4,
                'wallpaper' => 'Yoga Practice Schedule_wallpaper.jpg'
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Photography Classes Plan',
                'description' => 'Plan and schedule for attending upcoming photography classes.',
                // 'user_id' => 5,
                'photo' => 'Photography Classes Plan_photo.jpg'
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Camping Trip Preparations',
                'description' => 'Preparations and planning for the upcoming camping trip.',
                // 'user_id' => 6,
                'wallpaper' => 'Camping Trip Preparations_wallpaper.jpg'
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Personal Development Activities',
                'description' => 'Activities and tasks aimed at personal growth and development.',
                // 'user_id' => 1,
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Weekend Getaway Planning',
                'description' => 'Planning and arrangements for a weekend getaway trip.',
                // 'user_id' => 2,
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Financial Planning',
                'description' => 'Budgeting and financial planning for the upcoming months.',
                // 'user_id' => 3,
                'photo' => 'Financial Planning_photo.jpg',
                'wallpaper' => 'Financial Planning_wallpaper.jpg'
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Study Group Sessions',
                'description' => 'Organizing study sessions with fellow classmates.',
                // 'user_id' => 4,
                'photo' => 'Study Group Sessions_photo.jpg'
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Volunteering Opportunities',
                'description' => 'Exploring and organizing volunteering opportunities in the community.',
                // 'user_id' => 5,
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Book Club Discussions',
                'description' => 'Planning and discussions for the upcoming book club meetings.',
                // 'user_id' => 6,
                'photo' => 'Book Club Discussions_photo.jpg',
                'wallpaper' => 'Book Club Discussions_wallpaper.jpg'
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Fitness Challenge',
                'description' => 'Challenges and progress tracking for a fitness journey.',
                // 'user_id' => 1,
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Art Project Collaboration',
                'description' => 'Collaborative art project planning and execution.',
                // 'user_id' => 2,
                'photo' => 'Art Project Collaboration_photo.jpg',
                'wallpaper' => 'Art Project Collaboration_wallpaper.jpg'
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Language Exchange Group',
                'description' => 'Organizing language exchange sessions with native speakers.',
                // 'user_id' => 3,
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Healthy Eating Recipes',
                'description' => 'Sharing and discussing healthy recipes and meal ideas.',
                // 'user_id' => 4,
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'DIY Home Decor Projects',
                'description' => 'Planning and execution of do-it-yourself home decor projects.',
                // 'user_id' => 5,
                'photo' => 'DIY Home Decor Projects_photo.jpg',
                'wallpaper' => 'DIY Home Decor Projects_wallpaper.jpg'
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Job Search Support',
                'description' => 'Support and resources for job seekers in the community.',
                // 'user_id' => 6,
                'wallpaper' => 'Job Search Support_wallpaper.jpg'
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Travel Bucket List',
                'description' => 'Sharing and discussing travel bucket list destinations and experiences.',
                // 'user_id' => 1,
                'photo' => 'Travel Bucket List_photo.jpeg'
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Parenting Tips and Advice',
                'description' => 'Sharing parenting tips, advice, and experiences among parents.',
                // 'user_id' => 2,
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Online Learning Resources',
                'description' => 'Sharing and recommending online learning resources and courses.',
                // 'user_id' => 3,
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Music Jam Sessions',
                'description' => 'Organizing and planning music jam sessions with fellow musicians.',
                // 'user_id' => 4,
                'photo' => 'Music Jam Sessions_photo.jpg'
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Healthy Lifestyle Tips',
                'description' => 'Sharing and discussing tips for maintaining a healthy lifestyle.',
                // 'user_id' => 5,
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Community Events Planning',
                'description' => 'Planning and organizing community events and activities.',
                // 'user_id' => 6,
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Pet Care Tips',
                'description' => 'Sharing and discussing tips for pet care and training.',
                // 'user_id' => 1,
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Environmental Conservation Initiatives',
                'description' => 'Discussion and planning for environmental conservation initiatives.',
                // 'user_id' => 2,
                'photo' => 'Environmental Conservation Initiatives_photo.jpg',
                'wallpaper' => 'Environmental Conservation Initiatives_wallpaper.jpg'
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Home Office Setup Ideas',
                'description' => 'Sharing and discussing ideas for setting up a productive home office.',
                // 'user_id' => 3,
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Community Support Group',
                'description' => 'Support and encouragement for individuals facing challenges in the community.',
                // 'user_id' => 4,
                'photo' => 'Community Support Group_photo.jpg',
                'wallpaper' => 'Community Support Group_wallpaper.jpg'
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Financial Investment Strategies',
                'description' => 'Discussion and sharing of financial investment strategies and tips.',
                // 'user_id' => 5,
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'DIY Craft Projects',
                'description' => 'Sharing and planning of do-it-yourself craft projects and ideas.',
                // 'user_id' => 6,
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Virtual Gaming Community',
                'description' => 'Community for gamers to connect, organize events, and discuss gaming topics.',
                // 'user_id' => 1,
                'photo' => 'Virtual Gaming Community_photo.jpg',
                'wallpaper' => 'Virtual Gaming Community_wallpaper.jpg'
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Fashion Trends and Style Tips',
                'description' => 'Discussion and sharing of fashion trends, styling tips, and outfit ideas.',
                // 'user_id' => 2,
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Healthy Cooking Recipes',
                'description' => 'Sharing and discussing healthy cooking recipes and meal plans.',
                // 'user_id' => 3,
                'photo' => 'Healthy Cooking Recipes_photo.jpg',
                'wallpaper' => 'Healthy Cooking Recipes_wallpaper.jpg'
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Community Garden Planning',
                'description' => 'Planning and organizing community garden activities and maintenance.',
                // 'user_id' => 4,
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Remote Work Tips and Advice',
                'description' => 'Discussion and sharing of tips and advice for remote work and telecommuting.',
                // 'user_id' => 5,
                'wallpaper' => 'Remote Work Tips and Advice_wallpaper.jpg'
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Travel Photography Group',
                'description' => 'Community for travel photography enthusiasts to share tips, techniques, and photos.',
                // 'user_id' => 6,
                'wallpaper' => 'Travel Photography Group_wallpaper.jpg'
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Local Community Cleanup Initiatives',
                'description' => 'Planning and organizing local community cleanup events and initiatives.',
                // 'user_id' => 1,
            ],
        ]);

        DB::table('spaces')->insert([
            [
                'name' => 'Home Workout Challenge',
                'description' => 'Challenges and motivation for staying fit with home workout routines.',
                // 'user_id' => 2,
            ],
        ]);
    }
}
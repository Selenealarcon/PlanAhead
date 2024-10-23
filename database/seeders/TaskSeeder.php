<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Space 1: English Project
        DB::table('tasks')->insert([
            [
                'name' => 'Research English literature',
                'description' => 'Research various English literary works for project.',
                'type' => 'basic',
                'date' => '2024-05-01',
                'status' => 'To do',
                'space_id' => 1,
            ],
            [
                'name' => 'Write project proposal',
                'description' => 'Draft a proposal outlining the objectives and scope of the project.',
                'type' => 'basic',
                'date' => '2024-05-03',
                'status' => 'Done',
                'space_id' => 1,
            ],
        ]);

        // Space 2: Household Chores
        DB::table('tasks')->insert([
            [
                'name' => 'Grocery shopping',
                'description' => 'Purchase groceries for the week.',
                'type' => 'list',
                'date' => '2024-05-02',
                'status' => 'Not done',
                'space_id' => 2,
            ],
            [
                'name' => 'Clean kitchen',
                'description' => 'Clean and organize kitchen area.',
                'type' => 'basic',
                'date' => '2024-05-04',
                'status' => 'To do',
                'space_id' => 2,
            ],
        ]);

        // Space 3: Pedraforca Excursion
        DB::table('tasks')->insert([
            [
                'name' => 'Prepare hiking gear',
                'description' => 'Gather and prepare hiking gear for the Pedraforca excursion.',
                'type' => 'list',
                'date' => '2024-05-10',
                'status' => 'Done',
                'space_id' => 3,
            ],
            [
                'name' => 'Check weather forecast',
                'description' => 'Check the weather forecast for the day of the excursion.',
                'type' => 'basic',
                'date' => '2024-05-09',
                'status' => 'To do',
                'space_id' => 3,
            ],
        ]);

        // Space 4: Taylor Swift Concert Trip
        DB::table('tasks')->insert([
            [
                'name' => 'Buy concert tickets',
                'description' => 'Purchase tickets for the Taylor Swift concert.',
                'type' => 'basic',
                'date' => '2024-06-15',
                'status' => 'Not done',
                'space_id' => 4,
            ],
            [
                'name' => 'Plan transportation',
                'description' => 'Plan transportation to and from the concert venue.',
                'type' => 'basic',
                'date' => '2024-06-14',
                'status' => 'Done',
                'space_id' => 4,
            ],
        ]);

        // Space 5: Work Project Tasks
        DB::table('tasks')->insert([
            [
                'name' => 'Brainstorm project ideas',
                'description' => 'Hold a brainstorming session to generate ideas for the project.',
                'type' => 'basic',
                'date' => '2024-05-07',
                'status' => 'To do',
                'space_id' => 5,
            ],
            [
                'name' => 'Create project timeline',
                'description' => 'Outline the project timeline with key milestones and deadlines.',
                'type' => 'basic',
                'date' => '2024-05-09',
                'status' => 'Done',
                'space_id' => 5,
            ],
        ]);

        // Space 6: Exam Preparation
        DB::table('tasks')->insert([
            [
                'name' => 'Review study materials',
                'description' => 'Review textbooks, notes, and other study materials for exams.',
                'type' => 'basic',
                'date' => '2024-05-12',
                'status' => 'To do',
                'space_id' => 6,
            ],
            [
                'name' => 'Practice past exam papers',
                'description' => 'Practice solving past exam papers to prepare for the upcoming exams.',
                'type' => 'basic',
                'date' => '2024-05-15',
                'status' => 'Not done',
                'space_id' => 6,
            ],
        ]);

        // Space 7: Outdoor Exercise Plan
        DB::table('tasks')->insert([
            [
                'name' => 'Plan hiking routes',
                'description' => 'Research and plan hiking routes for outdoor exercises.',
                'type' => 'basic',
                'date' => '2024-05-05',
                'status' => 'Not done',
                'space_id' => 7,
            ],
            [
                'name' => 'Schedule outdoor yoga sessions',
                'description' => 'Plan and schedule outdoor yoga sessions.',
                'type' => 'basic',
                'date' => '2024-05-08',
                'status' => 'To do',
                'space_id' => 7,
            ],
        ]);

        // Space 8: Weekly Shopping List
        DB::table('tasks')->insert([
            [
                'name' => 'Create shopping list',
                'description' => 'Compile a list of groceries and household items needed for the week.',
                'type' => 'list',
                'date' => '2024-05-01',
                'status' => 'Done',
                'space_id' => 8,
            ],
            [
                'name' => 'Visit local market',
                'description' => 'Visit the local market to purchase fresh produce.',
                'type' => 'basic',
                'date' => '2024-05-03',
                'status' => 'To do',
                'space_id' => 8,
            ],
        ]);

        // Space 9: Gardening Project Plan
        DB::table('tasks')->insert([
            [
                'name' => 'Research plant species',
                'description' => 'Research and select appropriate plant species for the garden project.',
                'type' => 'basic',
                'date' => '2024-04-30',
                'status' => 'Not done',
                'space_id' => 9,
            ],
            [
                'name' => 'Prepare soil',
                'description' => 'Prepare the soil for planting according to the selected plant species.',
                'type' => 'basic',
                'date' => '2024-05-05',
                'status' => 'Done',
                'space_id' => 9,
            ],
        ]);

        // Space 10: Cooking Classes Schedule
        DB::table('tasks')->insert([
            [
                'name' => 'Create class curriculum',
                'description' => 'Design the curriculum for the upcoming cooking classes.',
                'type' => 'basic',
                'date' => '2024-04-28',
                'status' => 'Done',
                'space_id' => 10,
            ],
            [
                'name' => 'Finalize recipes',
                'description' => 'Finalize the recipes to be taught in the cooking classes.',
                'type' => 'basic',
                'date' => '2024-05-03',
                'status' => 'To do',
                'space_id' => 10,
            ],
        ]);

        // Space 11: Party Preparations Checklist
        DB::table('tasks')->insert([
            [
                'name' => 'Create guest list',
                'description' => 'Compile a list of guests to be invited to the party.',
                'type' => 'basic',
                'date' => '2024-05-01',
                'status' => 'Not done',
                'space_id' => 11,
            ],
            [
                'name' => 'Plan menu',
                'description' => 'Plan the menu for the party including food and beverages.',
                'type' => 'basic',
                'date' => '2024-05-05',
                'status' => 'Done',
                'space_id' => 11,
            ],
        ]);

        // Space 12: Research Project Outline
        DB::table('tasks')->insert([
            [
                'name' => 'Literature review',
                'description' => 'Conduct a literature review relevant to the research project.',
                'type' => 'basic',
                'date' => '2024-04-29',
                'status' => 'Done',
                'space_id' => 12,
            ],
            [
                'name' => 'Define research objectives',
                'description' => 'Define clear objectives for the research project.',
                'type' => 'basic',
                'date' => '2024-05-02',
                'status' => 'To do',
                'space_id' => 12,
            ],
        ]);

        // Space 13: Paris Trip Itinerary
        DB::table('tasks')->insert([
            [
                'name' => 'Book flights',
                'description' => 'Research and book flights to Paris.',
                'type' => 'basic',
                'date' => '2024-05-10',
                'status' => 'Done',
                'space_id' => 13,
            ],
            [
                'name' => 'Reserve accommodations',
                'description' => 'Find and reserve accommodations for the trip.',
                'type' => 'basic',
                'date' => '2024-05-15',
                'status' => 'Not done',
                'space_id' => 13,
            ],
        ]);

        // Space 14: Marathon Training Program
        DB::table('tasks')->insert([
            [
                'name' => 'Run 5 miles',
                'description' => 'Run 5 miles as part of the training program.',
                'type' => 'basic',
                'date' => '2024-05-01',
                'status' => 'Not done',
                'space_id' => 14,
            ],
            [
                'name' => 'Interval training',
                'description' => 'Complete interval training session according to the program.',
                'type' => 'basic',
                'date' => '2024-05-05',
                'status' => 'Done',
                'space_id' => 14,
            ],
        ]);

        // Space 15: Home Renovation Tasks
        DB::table('tasks')->insert([
            [
                'name' => 'Paint walls',
                'description' => 'Paint the walls of the living room area.',
                'type' => 'basic',
                'date' => '2024-05-08',
                'status' => 'Not done',
                'space_id' => 15,
            ],
            [
                'name' => 'Install new flooring',
                'description' => 'Install new flooring in the kitchen area.',
                'type' => 'basic',
                'date' => '2024-05-12',
                'status' => 'To do',
                'space_id' => 15,
            ],
        ]);

        // Space 16: Yoga Practice Schedule
        DB::table('tasks')->insert([
            [
                'name' => 'Attend yoga class',
                'description' => 'Attend the yoga class at the studio.',
                'type' => 'basic',
                'date' => '2024-05-03',
                'status' => 'Not done',
                'space_id' => 16,
            ],
            [
                'name' => 'Practice meditation',
                'description' => 'Practice meditation for 30 minutes.',
                'type' => 'basic',
                'date' => '2024-05-07',
                'status' => 'Done',
                'space_id' => 16,
            ],
        ]);

        // Space 17: Photography Classes Plan
        DB::table('tasks')->insert([
            [
                'name' => 'Research photography classes',
                'description' => 'Research and find suitable photography classes to attend.',
                'type' => 'basic',
                'date' => '2024-05-06',
                'status' => 'To do',
                'space_id' => 17,
            ],
            [
                'name' => 'Enroll in photography course',
                'description' => 'Enroll in the selected photography course.',
                'type' => 'basic',
                'date' => '2024-05-10',
                'status' => 'Done',
                'space_id' => 17,
            ],
        ]);

        // Space 18: Camping Trip Preparations
        DB::table('tasks')->insert([
            [
                'name' => 'Choose camping site',
                'description' => 'Research and choose a suitable camping site for the trip.',
                'type' => 'list',
                'date' => '2024-05-10',
                'status' => 'Done',
                'space_id' => 18,
            ],
            [
                'name' => 'Prepare camping gear',
                'description' => 'Check and prepare all necessary camping gear and equipment.',
                'type' => 'list',
                'date' => '2024-05-15',
                'status' => 'To do',
                'space_id' => 18,
            ],
        ]);

        // Space 19: Personal Development Activities
        DB::table('tasks')->insert([
            [
                'name' => 'Read one self-help book',
                'description' => 'Read one self-help book related to personal development.',
                'type' => 'list',
                'date' => '2024-05-05',
                'status' => 'To do',
                'space_id' => 19,
            ],
            [
                'name' => 'Attend a workshop',
                'description' => 'Attend a workshop or seminar on personal growth.',
                'type' => 'list',
                'date' => '2024-05-10',
                'status' => 'Not done',
                'space_id' => 19,
            ],
        ]);

        // Space 20: Weekend Getaway Planning
        DB::table('tasks')->insert([
            [
                'name' => 'Research destination',
                'description' => 'Research and choose a destination for the weekend getaway.',
                'type' => 'list',
                'date' => '2024-05-05',
                'status' => 'Done',
                'space_id' => 20,
            ],
            [
                'name' => 'Book accommodations',
                'description' => 'Find and book accommodations for the weekend trip.',
                'type' => 'list',
                'date' => '2024-05-08',
                'status' => 'Not done',
                'space_id' => 20,
            ],
        ]);

        // Space 21: Financial Planning
        DB::table('tasks')->insert([
            [
                'name' => 'Create monthly budget',
                'description' => 'Create a detailed budget plan for the upcoming months.',
                'type' => 'list',
                'date' => '2024-05-01',
                'status' => 'To do',
                'space_id' => 21,
            ],
            [
                'name' => 'Review investment portfolio',
                'description' => 'Review and analyze the current investment portfolio.',
                'type' => 'list',
                'date' => '2024-05-10',
                'status' => 'Not done',
                'space_id' => 21,
            ],
        ]);

        // Space 22: Study Group Sessions
        DB::table('tasks')->insert([
            [
                'name' => 'Set study schedule',
                'description' => 'Set up a study schedule for the upcoming exams.',
                'type' => 'list',
                'date' => '2024-05-03',
                'status' => 'Done',
                'space_id' => 22,
            ],
            [
                'name' => 'Review lecture notes',
                'description' => 'Review and summarize lecture notes with the study group.',
                'type' => 'list',
                'date' => '2024-05-07',
                'status' => 'Not done',
                'space_id' => 22,
            ],
        ]);

        // Space 23: Volunteering Opportunities
        DB::table('tasks')->insert([
            [
                'name' => 'Research local charities',
                'description' => 'Research local charities and organizations offering volunteering opportunities.',
                'type' => 'basic',
                'date' => '2024-05-05',
                'status' => 'To do',
                'space_id' => 23,
            ],
            [
                'name' => 'Contact volunteering programs',
                'description' => 'Contact volunteering programs to inquire about available opportunities.',
                'type' => 'basic',
                'date' => '2024-05-08',
                'status' => 'Done',
                'space_id' => 23,
            ],
        ]);

        // Space 24: Book Club Discussions
        DB::table('tasks')->insert([
            [
                'name' => 'Select next book',
                'description' => 'Discuss and decide on the book for the next book club meeting.',
                'type' => 'basic',
                'date' => '2024-05-10',
                'status' => 'Done',
                'space_id' => 24,
            ],
            [
                'name' => 'Prepare discussion questions',
                'description' => 'Prepare a list of discussion questions for the selected book.',
                'type' => 'basic',
                'date' => '2024-05-15',
                'status' => 'To do',
                'space_id' => 24,            ],
        ]);

        // Space 25: Fitness Challenge
        DB::table('tasks')->insert([
            [
                'name' => 'Set fitness goals',
                'description' => 'Set specific fitness goals for the duration of the challenge.',
                'type' => 'basic',
                'date' => '2024-05-01',
                'status' => 'Done',
                'space_id' => 25,
            ],
            [
                'name' => 'Create workout schedule',
                'description' => 'Create a weekly workout schedule to achieve the set goals.',
                'type' => 'basic',
                'date' => '2024-05-05',
                'status' => 'To do',
                'space_id' => 25,
            ],
        ]);

        // Space 26: Art Project Collaboration
        DB::table('tasks')->insert([
            [
                'name' => 'Brainstorm project ideas',
                'description' => 'Gather and brainstorm ideas for the collaborative art project.',
                'type' => 'basic',
                'date' => '2024-05-03',
                'status' => 'To do',
                'space_id' => 26,
            ],
            [
                'name' => 'Assign roles and responsibilities',
                'description' => 'Assign roles and responsibilities to project collaborators.',
                'type' => 'basic',
                'date' => '2024-05-07',
                'status' => 'Not done',
                'space_id' => 26,
            ],
        ]);

        // Space 27: Language Exchange Group
        DB::table('tasks')->insert([
            [
                'name' => 'Organize language exchange sessions',
                'description' => 'Schedule and organize language exchange sessions with native speakers.',
                'type' => 'basic',
                'date' => '2024-05-02',
                'status' => 'To do',
                'space_id' => 27,
            ],
            [
                'name' => 'Prepare language learning materials',
                'description' => 'Prepare learning materials for language exchange sessions.',
                'type' => 'basic',
                'date' => '2024-05-06',
                'status' => 'Done',
                'space_id' => 27,
            ],
        ]);

        // Space 28: Healthy Eating Recipes
        DB::table('tasks')->insert([
            [
                'name' => 'Share favorite healthy recipe',
                'description' => 'Share your favorite healthy recipe with the group.',
                'type' => 'basic',
                'date' => '2024-05-03',
                'status' => 'Done',
                'space_id' => 28,
            ],
            [
                'name' => 'Discuss meal planning tips',
                'description' => 'Discuss and exchange meal planning tips for a healthier lifestyle.',
                'type' => 'basic',
                'date' => '2024-05-07',
                'status' => 'To do',
                'space_id' => 28,
            ],
        ]);

        // Space 29: DIY Home Decor Projects
        DB::table('tasks')->insert([
            [
                'name' => 'Choose next DIY project',
                'description' => 'Discuss and choose the next DIY home decor project to undertake.',
                'type' => 'basic',
                'date' => '2024-05-05',
                'status' => 'To do',
                'space_id' => 29,
            ],
            [
                'name' => 'Gather materials',
                'description' => 'Compile a list of materials needed for the chosen DIY project.',
                'type' => 'basic',
                'date' => '2024-05-10',
                'status' => 'Done',
                'space_id' => 29,
            ],
        ]);

        // Space 30: Job Search Support
        DB::table('tasks')->insert([
            [
                'name' => 'Review resumes',
                'description' => 'Offer feedback and suggestions on resumes of fellow job seekers.',
                'type' => 'basic',
                'date' => '2024-05-08',
                'status' => 'Done',
                'space_id' => 30,
            ],
            [
                'name' => 'Share job leads',
                'description' => 'Share job openings and opportunities within your network.',
                'type' => 'basic',
                'date' => '2024-05-12',
                'status' => 'To do',
                'space_id' => 30,
            ],
        ]);

        // Space 31: Travel Bucket List
        DB::table('tasks')->insert([
            [
                'name' => 'Share dream travel destination',
                'description' => 'Share your dream travel destination and why it is on your bucket list.',
                'type' => 'basic',
                'date' => '2024-05-04',
                'status' => 'Done',
                'space_id' => 31,
            ],
            [
                'name' => 'Discuss travel experiences',
                'description' => 'Discuss memorable travel experiences and recommendations.',
                'type' => 'basic',
                'date' => '2024-05-09',
                'status' => 'To do',
                'space_id' => 31,
            ],
        ]);

        // Space 32: Parenting Tips and Advice
        DB::table('tasks')->insert([
            [
                'name' => 'Share parenting hack',
                'description' => 'Share a useful parenting tip or hack that has worked for you.',
                'type' => 'basic',
                'date' => '2024-05-06',
                'status' => 'Not done',
                'space_id' => 32,
            ],
            [
                'name' => 'Discuss child development',
                'description' => 'Discuss child development milestones and experiences.',
                'type' => 'basic',
                'date' => '2024-05-11',
                'status' => 'To do',
                'space_id' => 32,
            ],
        ]);

        // Space 33: Online Learning Resources
        DB::table('tasks')->insert([
            [
                'name' => 'Share favorite online course',
                'description' => 'Share your favorite online course with the group and explain why you recommend it.',
                'type' => 'basic',
                'date' => '2024-05-05',
                'status' => 'To do',
                'space_id' => 33,
            ],
            [
                'name' => 'Discuss learning platforms',
                'description' => 'Discuss and compare different online learning platforms and their benefits.',
                'type' => 'basic',
                'date' => '2024-05-10',
                'status' => 'Done',
                'space_id' => 33,
            ],
        ]);

        // Space 34: Music Jam Sessions
        DB::table('tasks')->insert([
            [
                'name' => 'Set jam session schedule',
                'description' => 'Set up a schedule for upcoming music jam sessions.',
                'type' => 'basic',
                'date' => '2024-05-03',
                'status' => 'Not done',
                'space_id' => 34,
            ],
            [
                'name' => 'Choose songs to play',
                'description' => 'Collaboratively choose songs to play during the jam sessions.',
                'type' => 'basic',
                'date' => '2024-05-08',
                'status' => 'To do',
                'space_id' => 34,
            ],
        ]);

        // Space 35: Healthy Lifestyle Tips
        DB::table('tasks')->insert([
            [
                'name' => 'Share fitness routine',
                'description' => 'Share your fitness routine or workout tips with the group.',
                'type' => 'basic',
                'date' => '2024-05-06',
                'status' => 'Done',
                'space_id' => 35,
            ],
            [
                'name' => 'Discuss healthy recipes',
                'description' => 'Discuss and exchange healthy recipes and meal ideas.',
                'type' => 'basic',
                'date' => '2024-05-11',
                'status' => 'To do',
                'space_id' => 35,
            ],
        ]);

        // Space 36: Community Events Planning
        DB::table('tasks')->insert([
            [
                'name' => 'Brainstorm event ideas',
                'description' => 'Brainstorm ideas for community events and activities.',
                'type' => 'basic',
                'date' => '2024-05-07',
                'status' => 'To do',
                'space_id' => 36,
            ],
            [
                'name' => 'Plan event logistics',
                'description' => 'Plan the logistics and details for upcoming community events.',
                'type' => 'basic',
                'date' => '2024-05-12',
                'status' => 'Done',
                'space_id' => 36,
            ],
        ]);

        // Space 37: Pet Care Tips
        DB::table('tasks')->insert([
            [
                'name' => 'Share pet training tips',
                'description' => 'Share tips and techniques for pet training and behavior management.',
                'type' => 'basic',
                'date' => '2024-05-08',
                'status' => 'Not done',
                'space_id' => 37,
            ],
            [
                'name' => 'Discuss pet nutrition',
                'description' => 'Discuss and exchange ideas on pet nutrition and dietary needs.',
                'type' => 'basic',
                'date' => '2024-05-13',
                'status' => 'To do',
                'space_id' => 37,
            ],
        ]);

        // Space 38: Environmental Conservation Initiatives
        DB::table('tasks')->insert([
            [
                'name' => 'Research local environmental issues',
                'description' => 'Research local environmental issues and identify areas for conservation efforts.',
                'type' => 'basic',
                'date' => '2024-05-05',
                'status' => 'Done',
                'space_id' => 38,
            ],
            [
                'name' => 'Plan conservation projects',
                'description' => 'Plan projects and initiatives to address identified environmental issues.',
                'type' => 'basic',
                'date' => '2024-05-10',
                'status' => 'To do',
                'space_id' => 38,
            ],
        ]);

        // Space 39: Home Office Setup Ideas
        DB::table('tasks')->insert([
            [
                'name' => 'Share home office organization tips',
                'description' => 'Share tips and ideas for organizing a productive home office space.',
                'type' => 'basic',
                'date' => '2024-05-06',
                'status' => 'To do',
                'space_id' => 39,
            ],
            [
                'name' => 'Discuss ergonomic setups',
                'description' => 'Discuss ergonomic setups and furniture options for a comfortable home office.',
                'type' => 'basic',
                'date' => '2024-05-11',
                'status' => 'Done',
                'space_id' => 39,
            ],
        ]);

        // Space 40: Community Support Group
        DB::table('tasks')->insert([
            [
                'name' => 'Share personal challenges',
                'description' => 'Offer support and empathy by sharing personal challenges and experiences.',
                'type' => 'basic',
                'date' => '2024-05-07',
                'status' => 'To do',
                'space_id' => 40,
            ],
            [
                'name' => 'Provide encouragement',
                'description' => 'Offer words of encouragement and support to members facing challenges.',
                'type' => 'basic',
                'date' => '2024-05-12',
                'status' => 'Not done',
                'space_id' => 40,
            ],
        ]);

        // Space 41: Financial Investment Strategies
        DB::table('tasks')->insert([
            [
                'name' => 'Discuss investment options',
                'description' => 'Discuss various investment options and their potential risks and returns.',
                'type' => 'basic',
                'date' => '2024-05-08',
                'status' => 'Done',
                'space_id' => 41,
            ],
            [
                'name' => 'Share investment success stories',
                'description' => 'Share personal success stories or lessons learned from investment experiences.',
                'type' => 'basic',
                'date' => '2024-05-13',
                'status' => 'To do',
                'space_id' => 41,
            ],
        ]);

        // Space 42: DIY Craft Projects
        DB::table('tasks')->insert([
            [
                'name' => 'Share craft project ideas',
                'description' => 'Share creative ideas for do-it-yourself craft projects.',
                'type' => 'basic',
                'date' => '2024-05-09',
                'status' => 'To do',
                'space_id' => 42,
            ],
            [
                'name' => 'Plan collaborative projects',
                'description' => 'Plan collaborative craft projects to work on together as a group.',
                'type' => 'basic',
                'date' => '2024-05-14',
                'status' => 'Done',
                'space_id' => 42,
            ],
        ]);

        // Space 43: Virtual Gaming Community
        DB::table('tasks')->insert([
            [
                'name' => 'Organize gaming tournament',
                'description' => 'Plan and organize a gaming tournament for community members.',
                'type' => 'basic',
                'date' => '2024-05-05',
                'status' => 'Not done',
                'space_id' => 43,
            ],
            [
                'name' => 'Discuss gaming strategies',
                'description' => 'Discuss and share gaming strategies and tips for popular games.',
                'type' => 'basic',
                'date' => '2024-05-10',
                'status' => 'To do',
                'space_id' => 43,
            ],
        ]);

        // Space 44: Fashion Trends and Style Tips
        DB::table('tasks')->insert([
            [
                'name' => 'Share favorite fashion trend',
                'description' => 'Share your favorite fashion trend and how you incorporate it into your style.',
                'type' => 'basic',
                'date' => '2024-05-06',
                'status' => 'Done',
                'space_id' => 44,
            ],
            [
                'name' => 'Discuss wardrobe essentials',
                'description' => 'Discuss essential pieces for a versatile wardrobe and how to style them.',
                'type' => 'basic',
                'date' => '2024-05-11',
                'status' => 'To do',
                'space_id' => 44,
            ],
        ]);

        // Space 45: Healthy Cooking Recipes
        DB::table('tasks')->insert([
            [
                'name' => 'Share healthy recipe of the week',
                'description' => 'Share a healthy recipe and cooking tips with the community.',
                'type' => 'basic',
                'date' => '2024-05-07',
                'status' => 'Done',
                'space_id' => 45,
            ],
            [
                'name' => 'Discuss meal prep ideas',
                'description' => 'Discuss and share meal prep ideas for a busy and healthy lifestyle.',
                'type' => 'basic',
                'date' => '2024-05-12',
                'status' => 'To do',
                'space_id' => 45,
            ],
        ]);

        // Space 46: Community Garden Planning
        DB::table('tasks')->insert([
            [
                'name' => 'Plan garden layout',
                'description' => 'Collaboratively plan the layout and design of the community garden.',
                'type' => 'basic',
                'date' => '2024-05-08',
                'status' => 'To do',
                'space_id' => 46,
            ],
            [
                'name' => 'Assign gardening tasks',
                'description' => 'Assign gardening tasks and responsibilities to community members.',
                'type' => 'basic',
                'date' => '2024-05-13',
                'status' => 'Done',
                'space_id' => 46,
            ],
        ]);

        // Space 47: Remote Work Tips and Advice
        DB::table('tasks')->insert([
            [
                'name' => 'Share productivity tip of the day',
                'description' => 'Share a productivity tip or advice for remote work.',
                'type' => 'basic',
                'date' => '2024-05-09',
                'status' => 'To do',
                'space_id' => 47,
            ],
            [
                'name' => 'Discuss work-life balance',
                'description' => 'Discuss strategies for maintaining a healthy work-life balance while working remotely.',
                'type' => 'basic',
                'date' => '2024-05-14',
                'status' => 'To do',
                'space_id' => 47,
            ],
        ]);

        // Space 48: Travel Photography Group
        DB::table('tasks')->insert([
            [
                'name' => 'Share travel photography tips',
                'description' => 'Share tips and techniques for capturing stunning travel photos.',
                'type' => 'basic',
                'date' => '2024-05-05',
                'status' => 'Done',
                'space_id' => 48,
            ],
            [
                'name' => 'Critique photo of the week',
                'description' => 'Critique and provide feedback on the selected travel photo of the week.',
                'type' => 'basic',
                'date' => '2024-05-10',
                'status' => 'To do',
                'space_id' => 48,
            ],
        ]);

        // Space 49: Local Community Cleanup Initiatives
        DB::table('tasks')->insert([
            [
                'name' => 'Plan cleanup event locations',
                'description' => 'Identify and plan cleanup locations within the local community.',
                'type' => 'basic',
                'date' => '2024-05-06',
                'status' => 'To do',
                'space_id' => 49,
            ],
            [
                'name' => 'Recruit volunteers',
                'description' => 'Recruit volunteers and assign roles for the cleanup event.',
                'type' => 'basic',
                'date' => '2024-05-11',
                'status' => 'Done',
                'space_id' => 49,
            ],
        ]);

        // Space 50: Home Workout Challenge
        DB::table('tasks')->insert([
            [
                'name' => 'Set fitness goals',
                'description' => 'Set personal fitness goals for the home workout challenge.',
                'type' => 'basic',
                'date' => '2024-05-07',
                'status' => 'Not done',
                'space_id' => 50,
            ],
            [
                'name' => 'Share workout routines',
                'description' => 'Share favorite home workout routines and exercises with the group.',
                'type' => 'basic',
                'date' => '2024-05-12',
                'status' => 'To do',
                'space_id' => 50,
            ],
        ]);


    }
}

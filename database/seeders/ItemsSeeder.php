<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items')->insert([
            [
                'name' => 'Milk',
                'task_id' => '3'
            ],
            [
                'name' => 'Eggs',
                'task_id' => '3'
            ],
            [
                'name' => 'Bread',
                'task_id' => '3'
            ],
            [
                'name' => 'Vegetables',
                'task_id' => '3'
            ],
            [
                'name' => 'Backpack',
                'task_id' => '5'
            ],
            [
                'name' => 'Hiking boots',
                'task_id' => '5'
            ],
            [
                'name' => 'Water bottle',
                'task_id' => '5'
            ],
            [
                'name' => 'Snacks',
                'task_id' => '5'
            ],
            [
                'name' => 'Bleach',
                'task_id' => '15'
            ],
            [
                'name' => 'Window cleaner',
                'task_id' => '15'
            ],
            [
                'name' => 'All-purpose cleaner',
                'task_id' => '15'
            ],
            [
                'name' => 'Dish soap',
                'task_id' => '15'
            ],
            [
                'name' => 'Laundry detergent',
                'task_id' => '15'
            ],
            [
                'name' => 'Check accessibility',
                'task_id' => '35'
            ],
            [
                'name' => 'Look for nearby attractions',
                'task_id' => '35'
            ],
            [
                'name' => 'Verify facilities',
                'task_id' => '35'
            ],
            [
                'name' => 'Tent',
                'task_id' => '36'
            ],
            [
                'name' => 'Sleeping bags',
                'task_id' => '36'
            ],
            [
                'name' => 'Cooking stove',
                'task_id' => '36'
            ],
            [
                'name' => 'Flashlights',
                'task_id' => '36'
            ],
            [
                'name' => 'Book: The Power of Now',
                'task_id' => '37'
            ],
            [
                'name' => 'Book: Mindset: The New Psychology of Success',
                'task_id' => '37'
            ],
            [
                'name' => 'Seminar: How to Win Friends and Influence People',
                'task_id' => '38'
            ],
            [
                'name' => 'Workshop: Goal Setting and Achievement',
                'task_id' => '38'
            ],
            [
                'name' => 'Beach Resort',
                'task_id' => '39'
            ],
            [
                'name' => 'Snorkeling',
                'task_id' => '39'
            ],
            [
                'name' => 'Relaxing on the beach',
                'task_id' => '39'
            ],
            [
                'name' => 'Paradise Beach Resort',
                'task_id' => '40'
            ],
            [
                'name' => 'Ocean View Suite',
                'task_id' => '40'
            ],
            [
                'name' => 'May 20-22',
                'task_id' => '40'
            ],
            [
                'name' => 'Allocate funds for rent',
                'task_id' => '41'
            ],
            [
                'name' => 'Allocate funds for groceries',
                'task_id' => '41'
            ],
            [
                'name' => 'Set aside savings',
                'task_id' => '41'
            ],
            [
                'name' => 'Stocks: Evaluate performance',
                'task_id' => '42'
            ],
            [
                'name' => 'Bonds: Review interest rates',
                'task_id' => '42'
            ],
            [
                'name' => 'Diversification: Assess risk exposure',
                'task_id' => '42'
            ],
            [
                'name' => 'Math',
                'task_id' => '43'
            ],
            [
                'name' => 'Science',
                'task_id' => '43'
            ],
            [
                'name' => 'History',
                'task_id' => '43'
            ],
            [
                'name' => '2 hours each day',
                'task_id' => '43'
            ],
            [
                'name' => 'Chapter 1: Introduction',
                'task_id' => '44'
            ],
            [
                'name' => 'Chapter 2: Theoretical Framework',
                'task_id' => '44'
            ],
            [
                'name' => 'Chapter 3: Methodology',
                'task_id' => '44'
            ],
        ]);
    }
}

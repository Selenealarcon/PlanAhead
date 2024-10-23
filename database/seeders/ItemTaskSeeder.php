<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\Item;



class ItemTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = Task::all();
        $items = Item::all();

        foreach ($tasks as $task) {
            $task->items()->attach($items->pluck('id')->toArray());
        }
    }
}

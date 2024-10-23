<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $spaces = DB::table('spaces')->get();

        foreach ($spaces as $space) {
            $usersInSpace = DB::table('space_user')->where('space_id', $space->id)->pluck('user_id')->toArray();
    
            $tasksInSpace = DB::table('tasks')->where('space_id', $space->id)->get();
    
            foreach ($tasksInSpace as $task) {
                $userId = $usersInSpace[array_rand($usersInSpace)];
                DB::table('task_user')->insert([
                    'task_id' => $task->id,
                    'user_id' => $userId,
                ]);
            }
        }
    }
}

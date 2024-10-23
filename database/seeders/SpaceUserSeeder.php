<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SpaceUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $spaceMembers = [
            1 => [1, 2],
            2 => [2],
            3 => [3, 4, 5],
            4 => [4, 1, 2],
            5 => [5, 6],
            6 => [6],
            7 => [1, 4, 5, 6],
            8 => [2, 4, 5],
            9 => [3],
            10 => [4],
            11 => [5],
            12 => [6],
            13 => [1, 6, 3],
            14 => [2, 5],
            15 => [3, 4],
            16 => [4, 1],
            17 => [5, 2],
            18 => [6, 1],
            19 => [1],
            20 => [2, 4],
            21 => [3, 1],
            22 => [4, 6],
            23 => [5, 3],
            24 => [6, 2],
            25 => [1, 2, 3],
            26 => [2, 3, 4],
            27 => [3, 4, 5, 6],
            28 => [4, 1, 2],
            29 => [5, 6],
            30 => [6, 5],
            31 => [1, 5],
            32 => [2, 1, 3, 4, 5, 6],
            33 => [3],
            34 => [4],
            35 => [5],
            36 => [6],
            37 => [1],
            38 => [2],
            39 => [3, 5],
            40 => [4, 6, 2],
            41 => [5, 2, 4],
            42 => [6, 3, 5],
            43 => [1, 4, 3],
            44 => [2, 5, 3, 1],
            45 => [3, 1],
            46 => [4, 3],
            47 => [5, 4],
            48 => [6, 2],
            49 => [1, 2],
            50 => [2, 1]
        ];

        $administrators = [
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4,
            5 => 5,
            6 => 6,
            7 => 1,
            8 => 2,
            9 => 3,
            10 => 4,
            11 => 5,
            12 => 6,
            13 => 1,
            14 => 2,
            15 => 3,
            16 => 4,
            17 => 5,
            18 => 6,
            19 => 1,
            20 => 2,
            21 => 3,
            22 => 4,
            23 => 5,
            24 => 6,
            25 => 1,
            26 => 2,
            27 => 3,
            28 => 4,
            29 => 5,
            30 => 6,
            31 => 1,
            32 => 2,
            33 => 3,
            34 => 4,
            35 => 5,
            36 => 6,
            37 => 1,
            38 => 2,
            39 => 3,
            40 => 4,
            41 => 5,
            42 => 6,
            43 => 1,
            44 => 2,
            45 => 3,
            46 => 4,
            47 => 5,
            48 => 6,
            49 => 1,
            50 => 2
        ];

        foreach ($spaceMembers as $spaceId => $members) {
            foreach ($members as $memberId) {
                $administrator = ($memberId == $administrators[$spaceId]) ? 1 : 0;
                DB::table('space_user')->insert([
                    'space_id' => $spaceId,
                    'user_id' => $memberId,
                    'administrator' => $administrator,
                ]);
            }
        }
    }
}


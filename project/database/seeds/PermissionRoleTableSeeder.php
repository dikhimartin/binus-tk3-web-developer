<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            [1, 1],
            [2, 1],
            [3, 1],
            [4, 1],
            [5, 1],
            [6, 1],
            [7, 1],
            [8, 1],
            [9, 1],
            [10, 1],
            [11, 1],
            [12, 1],
            [13, 1],
            [14, 1],
            [15, 1],
            [16, 1],
            [17, 1],
            [18, 1],
            [19, 1],
            [20, 1],
            [21, 1],
            [22, 1],
            [23, 1],
            [24, 1],
            [25, 1],
            [26, 1],
            [27, 1],
            [28, 1],
            [29, 1],
            [30, 1],
            [31, 1],
            [32, 1],
            // add new role here 
            [1, 2],
            [5, 2],
            [9, 2]
        ];

        foreach ($records as $record) {
            DB::table('permission_role')->insert([
                'permission_id' => $record[0],
                'role_id' => $record[1],
            ]);
        }
    }
}

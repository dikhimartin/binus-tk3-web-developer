<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'id' => 1,
                'name' => 'roles-list',
                'display_name' => 'Role List',
                'description' => 'Role List',
                'sort' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'name' => 'roles-create',
                'display_name' => 'Role Add',
                'description' => 'Role Add',
                'sort' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'name' => 'roles-edit',
                'display_name' => 'Role Edit',
                'description' => 'Role Edit',
                'sort' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 4,
                'name' => 'roles-delete',
                'display_name' => 'Role Delete',
                'description' => 'Role Delete',
                'sort' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 5,
                'name' => 'users-list',
                'display_name' => 'Users List',
                'description' => 'Users list',
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 6,
                'name' => 'users-create',
                'display_name' => 'Users Create',
                'description' => 'Users create',
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 7,
                'name' => 'users-edit',
                'display_name' => 'Users Edit',
                'description' => 'Users edit',
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 8,
                'name' => 'users-delete',
                'display_name' => 'Users Delete',
                'description' => 'Users delete',
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 9,
                'name' => 'sample-list',
                'display_name' => 'Sample List',
                'description' => 'Sample List',
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 10,
                'name' => 'sample-create',
                'display_name' => 'Sample Create',
                'description' => 'Sample Create',
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 11,
                'name' => 'sample-edit',
                'display_name' => 'Sample Edit',
                'description' => 'Sample Edit',
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 12,
                'name' => 'sample-delete',
                'display_name' => 'Sample Delete',
                'description' => 'Sample Delete',
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
            // add new permissions here 
        ]);
    }
}

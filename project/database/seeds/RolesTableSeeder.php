<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'id' => 1,
                'name' => 'Super Admin',
                'display_name' => 'Super Admin',
                'description' => ' pengguna yang memiliki akses penuh dan kontrol atas semua fitur dan fungsi dalam sistem. Mereka dapat membuat, mengedit, menghapus dan membatalkan hak akses pengguna lain dalam sistem.',
                'status' => 1,
                'created_at' => '2023-03-17 14:24:23',
                'updated_at' => '2023-03-17 14:24:23'
            ],
            [
                'id' => 2,
                'name' => 'Admin',
                'display_name' => 'Admin',
                'description' => 'pengguna yang memiliki hak akses yang lebih rendah daripada Super Admin. Mereka dapat mengakses dan mengelola beberapa fitur dalam sistem sesuai dengan wewenang yang diberikan oleh Super Admin, seperti mengelola pengguna dan memodifikasi konten tertentu.',
                'status' => 1,
                'created_at' => '2023-03-17 14:24:23',
                'updated_at' => '2023-03-17 14:24:23'
            ],
            [
                'id' => 3,
                'name' => 'Guest',
                'display_name' => 'Guest',
                'description' => 'pengguna yang tidak memiliki hak akses khusus dalam sistem dan biasanya hanya dapat mengakses fitur dasar yang tersedia untuk publik seperti membaca informasi umum atau mengakses halaman depan situs web. Mereka tidak dapat melakukan perubahan atau modifikasi dalam sistem.',
                'status' => 1,
                'created_at' => '2023-03-17 14:24:23',
                'updated_at' => '2023-03-17 14:24:23'
            ]
        ]);
    }
}
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
                'display_name' => 'Daftar Hak Akses',
                'description' => 'Daftar Hak Akses',
                'sort' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'name' => 'roles-create',
                'display_name' => 'Tambah Hak Akses',
                'description' => 'Tambah Hak Akses',
                'sort' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'name' => 'roles-edit',
                'display_name' => 'Ubah Hak Akses',
                'description' => 'Ubah Hak Akses',
                'sort' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 4,
                'name' => 'roles-delete',
                'display_name' => 'Hapus Hak Akses',
                'description' => 'Hapus Hak Akses',
                'sort' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 5,
                'name' => 'users-list',
                'display_name' => 'Daftar Pengguna',
                'description' => 'Daftar Pengguna',
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 6,
                'name' => 'users-create',
                'display_name' => 'Tambah Pengguna',
                'description' => 'Tambah Pengguna',
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 7,
                'name' => 'users-edit',
                'display_name' => 'Ubah Pengguna',
                'description' => 'Ubah Pengguna',
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 8,
                'name' => 'users-delete',
                'display_name' => 'Hapus Pengguna',
                'description' => 'Hapus Pengguna',
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
            ],
            [
                'id' => 13,
                'name' => 'customer-list',
                'display_name' => 'Daftar Pembeli',
                'description' => 'Daftar Pembeli',
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 14,
                'name' => 'customer-create',
                'display_name' => 'Tambah Pembeli',
                'description' => 'Tambah Pembeli',
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 15,
                'name' => 'customer-edit',
                'display_name' => 'Ubah Pembeli',
                'description' => 'Ubah Pembeli',
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 16,
                'name' => 'customer-delete',
                'display_name' => 'Hapus Pembeli',
                'description' => 'Hapus Pembeli',
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 17,
                'name' => 'staff-list',
                'display_name' => 'Daftar Staff',
                'description' => 'Daftar Staff',
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 18,
                'name' => 'staff-create',
                'display_name' => 'Tambah Staff',
                'description' => 'Tambah Staff',
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 19,
                'name' => 'staff-edit',
                'display_name' => 'Ubah Staff',
                'description' => 'Ubah Staff',
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 20,
                'name' => 'staff-delete',
                'display_name' => 'Hapus Staff',
                'description' => 'Hapus Staff',
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 21,
                'name' => 'stuff-list',
                'display_name' => 'Daftar Barang',
                'description' => 'Daftar Barang',
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 22,
                'name' => 'stuff-create',
                'display_name' => 'Tambah Barang',
                'description' => 'Tambah Barang',
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 23,
                'name' => 'stuff-edit',
                'display_name' => 'Ubah Barang',
                'description' => 'Ubah Barang',
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 24,
                'name' => 'stuff-delete',
                'display_name' => 'Hapus Barang',
                'description' => 'Hapus Barang',
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 25,
                'name' => 'transaction-list',
                'display_name' => 'Daftar Penjualan',
                'description' => 'Daftar Penjualan',
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 26,
                'name' => 'transaction-create',
                'display_name' => 'Tambah Penjualan',
                'description' => 'Tambah Penjualan',
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 27,
                'name' => 'transaction-edit',
                'display_name' => 'Ubah Penjualan',
                'description' => 'Ubah Penjualan',
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 28,
                'name' => 'transaction-delete',
                'display_name' => 'Hapus Penjualan',
                'description' => 'Hapus Penjualan',
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
            // add new permissions here 
        ]);
    }
}

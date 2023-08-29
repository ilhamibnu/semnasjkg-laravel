<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Semnas;
use App\Models\Kampus;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        Role::create([
            'name' => 'User',
        ]);

        Role::create([
            'name' => 'Admin',
        ]);

        Semnas::create([
            'name' => 'Seminar Nasional JKG',
            'deskripsi' => 'Pemaparan materi tentang pengajuan proposal dalam bidang kesehatan gigi dalam rangka PKM Raya',
            'harga' => '50000',
        ]);

        Kampus::create([
            'name' => 'Politekkes Kemenkes Surabaya',
        ]);

        Kampus::create([
            'name' => 'Politekkes Kemenkes Malang',
        ]);

        Kampus::create([
            'name' => 'Politekkes Kemenkes Semarang',
        ]);
    }
}

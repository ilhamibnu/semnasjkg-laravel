<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Group;
use App\Models\JenisPeserta;
use Illuminate\Database\Seeder;
use App\Models\Semnas;
use App\Models\Kampus;
use App\Models\Lomba;
use App\Models\Presensi;
use App\Models\Role;
use App\Models\Sertifikat;
use App\Models\User;

use function Laravel\Prompts\password;

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



        JenisPeserta::create([
            'name' => 'Surabaya',
        ]);

        JenisPeserta::create([
            'name' => 'Non Surabaya',
        ]);


        Kampus::create([
            'name' => 'Politekkes Kemenkes Surabaya',
            'id_jenis_peserta' => '1'
        ]);


        Kampus::create([
            'name' => 'Poltekkes Kemenkes Semarang',
            'id_jenis_peserta' => '2'
        ]);

        Kampus::create([
            'name' => 'Poltekkes Kemenkes Bandung',
            'id_jenis_peserta' => '2'
        ]);

        Kampus::create([
            'name' => 'Poltekkes Kemenkes Denpasar',
            'id_jenis_peserta' => '2'
        ]);

        Kampus::create([
            'name' => 'Poltekkes Kemenkes Aceh',
            'id_jenis_peserta' => '2'
        ]);

        Kampus::create([
            'name' => 'Poltekkes Kemenkes Palembang',
            'id_jenis_peserta' => '2'
        ]);

        Kampus::create([
            'name' => 'Poltekkes Kemenkes Jakarta 1',
            'id_jenis_peserta' => '2'
        ]);

        Kampus::create([
            'name' => 'Poltekkes Kemenkes Yogyakarta',
            'id_jenis_peserta' => '2'
        ]);

        Kampus::create([
            'name' => 'Poltekkes Kemenkes Makassar',
            'id_jenis_peserta' => '2'
        ]);

        Kampus::create([
            'name' => 'Poltekkes Kemenkes Pontianak',
            'id_jenis_peserta' => '2'
        ]);

        Kampus::create([
            'name' => 'Poltekkes Kemenkes Banjarmasin',
            'id_jenis_peserta' => '2'
        ]);

        Kampus::create([
            'name' => 'Poltekkes Kemenkes Kupang',
            'id_jenis_peserta' => '2'
        ]);

        Kampus::create([
            'name' => 'Poltekkes Kemenkes Tanjung Karang',
            'id_jenis_peserta' => '2'
        ]);

        Kampus::create([
            'name' => 'Poltekkes Kemenkes Jambi',
            'id_jenis_peserta' => '2'
        ]);

        Kampus::create([
            'name' => 'Poltekkes Kemenkes Tasikmalaya',
            'id_jenis_peserta' => '2'
        ]);

        Kampus::create([
            'name' => 'Poltekkes Kemenkes Padang',
            'id_jenis_peserta' => '2'
        ]);

        Kampus::create([
            'name' => 'Poltekkes Kemenkes Medan',
            'id_jenis_peserta' => '2'
        ]);

        Kampus::create([
            'name' => 'Poltekkes Kemenkes Manado',
            'id_jenis_peserta' => '2'
        ]);

        Kampus::create([
            'name' => 'FKG Universitas Airlangga',
            'id_jenis_peserta' => '2'
        ]);

        Kampus::create([
            'name' => 'FKG Universitas Brawijaya',
            'id_jenis_peserta' => '2'
        ]);

        Kampus::create([
            'name' => 'FKG Uuniversitas Jember',
            'id_jenis_peserta' => '2'
        ]);

        Kampus::create([
            'name' => 'FKG Universitas Hang Tuah',
            'id_jenis_peserta' => '2'
        ]);

        Kampus::create([
            'name' => 'FKG IIK Bhakti Wiyata',
            'id_jenis_peserta' => '2'
        ]);

        Kampus::create([
            'name' => 'FKG Universitas Diponegoro',
            'id_jenis_peserta' => '2'
        ]);

        Kampus::create([
            'name' => 'FKG Universitas Jendral Soedirman',
            'id_jenis_peserta' => '2'
        ]);

        Kampus::create([
            'name' => 'FKG Universitas Islam Sultan Agung',
            'id_jenis_peserta' => '2'
        ]);

        Kampus::create([
            'name' => 'FKG Universitas Muhammadiyah Semarang',
            'id_jenis_peserta' => '2'
        ]);

        Kampus::create([
            'name' => 'FKG Universitas Muhammadiyah Surakarta',
            'id_jenis_peserta' => '2'
        ]);

        Kampus::create([
            'name' => 'FKG Universitas Padjadjaran',
            'id_jenis_peserta' => '2'
        ]);


        Kampus::create([
            'name' => 'FKG Universitas Jenderal Achmad Yani',
            'id_jenis_peserta' => '2'
        ]);


        Kampus::create([
            'name' => 'FKG Universitas Andalas',
            'id_jenis_peserta' => '2'
        ]);


        Kampus::create([
            'name' => 'FKG Universitas Baiturrahmah',
            'id_jenis_peserta' => '2'
        ]);

        Kampus::create([
            'name' => 'FKG Universitas Sriwijaya',
            'id_jenis_peserta' => '2'
        ]);

        Kampus::create([
            'name' => 'FKG Universitas Hasanuddin',
            'id_jenis_peserta' => '2'
        ]);

        Kampus::create([
            'name' => 'FKG Universitas Muslim Indonesia',
            'id_jenis_peserta' => '2'
        ]);


        Kampus::create([
            'name' => 'FKG Universitas Sam Ratulangi',
            'id_jenis_peserta' => '2'
        ]);

        Kampus::create([
            'name' => 'FKG Universitas Lambung Mangkurat',
            'id_jenis_peserta' => '2'
        ]);


        Kampus::create([
            'name' => 'FKG Universitas Mulawarman',
            'id_jenis_peserta' => '2'
        ]);


        Kampus::create([
            'name' => 'FKG Universitas Indonesia',
            'id_jenis_peserta' => '2'
        ]);


        Kampus::create([
            'name' => 'FKG Universitas Trisakti',
            'id_jenis_peserta' => '2'
        ]);


        Kampus::create([
            'name' => 'FKG Universitas Syiah Kuala',
            'id_jenis_peserta' => '2'
        ]);


        Kampus::create([
            'name' => 'FKG Universitas Mahasaraswati',
            'id_jenis_peserta' => '2'
        ]);


        Kampus::create([
            'name' => 'FKG Universitas Gadjah Mada',
            'id_jenis_peserta' => '2'
        ]);


        Kampus::create([
            'name' => 'FKG Universitas Muhammadiyah Yogyakarta',
            'id_jenis_peserta' => '2'
        ]);


        Kampus::create([
            'name' => 'Lainya',
            'id_jenis_peserta' => '2'
        ]);






        Semnas::create([
            'name' => 'Seminar (Surabaya)',
            'deskripsi' => 'Pemaparan materi tentang pengajuan proposal dalam bidang kesehatan gigi dalam rangka PKM Raya',
            'harga' => '25000',
            'id_jenis_peserta' => '1',
        ]);

        Semnas::create([
            'name' => 'Speech English & Seminar (Surabaya)',
            'deskripsi' => 'Pemaparan materi tentang pengajuan proposal dalam bidang kesehatan gigi dalam rangka PKM Raya',
            'harga' => '25000',
            'id_jenis_peserta' => '1',
        ]);





        Semnas::create([
            'name' => 'Seminar (Non Surabaya)',
            'deskripsi' => 'Pemaparan materi tentang pengajuan proposal dalam bidang kesehatan gigi dalam rangka PKM Raya',
            'harga' => '50000',
            'id_jenis_peserta' => '2',
        ]);

        Semnas::create([
            'name' => 'Speech English & Seminar (Non Surabaya)',
            'deskripsi' => 'Pemaparan materi tentang pengajuan proposal dalam bidang kesehatan gigi dalam rangka PKM Raya',
            'harga' => '65000',
            'id_jenis_peserta' => '2',
        ]);






        Lomba::create([
            'name' => 'Speech English',
            'id_semnas' => '2',
            'link_sertifikat' => 'https://script.google.com/macros/s/AKfycbzEM5kzczJSTQw6rSC9MDTfWq0LH0xPdWfpO0vjLGmqXnZsqVvfC7B8kjD-ttdX6VsGsg/exec',
            'status' => 'aktif',
            'status_pengumpulan' => 'aktif',
            'status_pengumpulan_ktm' => 'aktif',
        ]);


        Lomba::create([
            'name' => 'Speech English',
            'id_semnas' => '4',
            'link_sertifikat' => 'https://script.google.com/macros/s/AKfycbzEM5kzczJSTQw6rSC9MDTfWq0LH0xPdWfpO0vjLGmqXnZsqVvfC7B8kjD-ttdX6VsGsg/exec',
            'status' => 'aktif',
            'status_pengumpulan' => 'aktif',
            'status_pengumpulan_ktm' => 'aktif',
        ]);






        Sertifikat::create([
            'id_semnas' => '1',
            'name' => 'Sertifikat Seminar',
            'link' => 'https://script.google.com/macros/s/AKfycbzEM5kzczJSTQw6rSC9MDTfWq0LH0xPdWfpO0vjLGmqXnZsqVvfC7B8kjD-ttdX6VsGsg/exec',
            'status' => 'aktif',
        ]);

        Sertifikat::create([
            'id_semnas' => '2',
            'name' => 'Sertifikat Seminar',
            'link' => 'https://script.google.com/macros/s/AKfycbzEM5kzczJSTQw6rSC9MDTfWq0LH0xPdWfpO0vjLGmqXnZsqVvfC7B8kjD-ttdX6VsGsg/exec',
            'status' => 'aktif',
        ]);

        Sertifikat::create([
            'id_semnas' => '3',
            'name' => 'Sertifikat Seminar',
            'link' => 'https://script.google.com/macros/s/AKfycbzEM5kzczJSTQw6rSC9MDTfWq0LH0xPdWfpO0vjLGmqXnZsqVvfC7B8kjD-ttdX6VsGsg/exec',
            'status' => 'aktif',
        ]);

        Sertifikat::create([
            'id_semnas' => '4',
            'name' => 'Sertifikat Seminar',
            'link' => 'https://script.google.com/macros/s/AKfycbzEM5kzczJSTQw6rSC9MDTfWq0LH0xPdWfpO0vjLGmqXnZsqVvfC7B8kjD-ttdX6VsGsg/exec',
            'status' => 'aktif',
        ]);







        Group::create([
            'id_semnas' => '2',
            'name' => 'Group Whatsapp English Speech & Seminar',
            'link' => 'https://chat.whatsapp.com/EDvBVmO4NTlB8KtC9lNJog',
            'status' => 'tersedia',
        ]);


        Group::create([
            'id_semnas' => '3',
            'name' => 'Group Whatsapp Seminar',
            'link' => 'https://chat.whatsapp.com/D9jgK6eK4IEJBkdkzbew06',
            'status' => 'tersedia',
        ]);


        Group::create([
            'id_semnas' => '4',
            'name' => 'Group Whatsapp English Speech & Seminar',
            'link' => 'https://chat.whatsapp.com/EDvBVmO4NTlB8KtC9lNJog',
            'status' => 'tersedia',
        ]);







        Presensi::create([
            'id_semnas' => '1',
            'name' => 'Presensi Seminar 1',
            'waktu_mulai' => '2023-12-23 09:00:00',
            'waktu_selesai' => '2023-12-23 11:00:00',
        ]);

        Presensi::create([
            'id_semnas' => '1',
            'name' => 'Presensi Seminar 2',
            'waktu_mulai' => '2023-12-23 11:00:00',
            'waktu_selesai' => '2023-12-23 13:00:00',
        ]);


        Presensi::create([
            'id_semnas' => '2',
            'name' => 'Presensi Seminar 1',
            'waktu_mulai' => '2023-12-23 09:00:00',
            'waktu_selesai' => '2023-12-23 11:00:00',
        ]);

        Presensi::create([
            'id_semnas' => '2',
            'name' => 'Presensi Seminar 2',
            'waktu_mulai' => '2023-12-23 11:00:00',
            'waktu_selesai' => '2023-12-23 13:00:00',
        ]);


        Presensi::create([
            'id_semnas' => '3',
            'name' => 'Presensi Seminar 1',
            'waktu_mulai' => '2023-12-23 09:00:00',
            'waktu_selesai' => '2023-12-23 11:00:00',
        ]);

        Presensi::create([
            'id_semnas' => '3',
            'name' => 'Presensi Seminar 2',
            'waktu_mulai' => '2023-12-23 11:00:00',
            'waktu_selesai' => '2023-12-23 13:00:00',
        ]);


        Presensi::create([
            'id_semnas' => '4',
            'name' => 'Presensi Seminar 1',
            'waktu_mulai' => '2023-12-23 09:00:00',
            'waktu_selesai' => '2023-12-23 11:00:00',
        ]);

        Presensi::create([
            'id_semnas' => '4',
            'name' => 'Presensi Seminar 2',
            'waktu_mulai' => '2023-12-23 11:00:00',
            'waktu_selesai' => '2023-12-23 13:00:00',
        ]);







        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('adminaja@123'),
            'id_role' => '2',
        ]);
    }
}

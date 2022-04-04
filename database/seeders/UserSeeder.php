<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            [
                'nip' => '196211221989031001',
                'role_id' => 'R1',
                'perawat_klinik_id' => 'PK0',
                'nama' => 'Dr.dr. Yusirwan, Sp.BA (K), MARS',
                'tempat_lahir' => '-',
                'tanggal_lahir' => '1978-03-17',
                'golongan' => 'IV/D',
                'pangkat' => 'Pembina Utama Madya',
                'mulai_dinas' => '1999',
                'pendidikan' => '-',
                'email' => 'arizi123@gmail.com',
                'email_verified_at' => '2022-03-25 12:27:05',
                'password' => bcrypt('12345678'),
            ],
        ];
        foreach ($role as $key => $value){
            User::create($value);
        }
    }
}

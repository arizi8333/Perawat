<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PerawatKlinik;

class PerawatKlinikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pk = [
            [
                'id_perawat_klinik' => 'PK1',
                'jabatan' => 'Perawat Klinik I',
            ],
            [
                'id_perawat_klinik' => 'PK2',
                'jabatan' => 'Perawat Klinik II',
            ],
            [
                'id_perawat_klinik' => 'PK3',
                'jabatan' => 'Perawat Klinik III',
            ],
            [
                'id_perawat_klinik' => 'PK4',
                'jabatan' => 'Perawat Klinik IV',
            ],
        ];
        foreach ($pk as $key => $value){
            PerawatKlinik::create($value);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
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
                'id' => 'R1',
                'nama_role' => 'Direktur Utama',
            ],
            [
                'id' => 'R2',
                'nama_role' => 'Komite',
            ],
            [
                'id' => 'R3',
                'nama_role' => 'Perawat',
            ],
        ];
        foreach ($role as $key => $value){
            Role::create($value);
        }
    }
}

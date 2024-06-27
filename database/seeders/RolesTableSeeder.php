<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['Estudiante', 'Profesor', 'Personal Administrativo'];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
    }
}

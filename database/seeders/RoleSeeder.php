<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'superadmin',
            'admin_prodi',
            'admin_jurusan',
            'admin_keuangan',
            'admin_kemahasiswaan',
            'admin_akademik',
            'admin_kepegawaian',
            'validator_kepegawaian',
            'kajur',
            'kaprodi',
            'plp',
            'dosen',
            'mahasiswa',
        ];

        foreach ($roles as $roleName) {
            // Check if the role already exists to avoid duplicates
            $role = Role::firstOrCreate([
                'name' => $roleName,
                'guard_name' => 'web',
            ]);

            // Assign all permissions to the role
            // $role->syncPermissions(Permission::all());
        }
    }
}

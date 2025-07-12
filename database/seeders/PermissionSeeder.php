<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
// use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'data-master-view',
            'data-master-manage',
            'mahasiswa-view',
            'mahasiswa-manage',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'id' => Str::Uuid(),
                'name' => $permission,
                'guard_name' => 'web',
            ]);
            
        }
    }
}

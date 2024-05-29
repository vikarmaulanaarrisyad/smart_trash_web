<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = new Role();
        $role->name = 'Admin';
        $role->save();

        // mendapatkan seluruh permission
        $permissions = Permission::all();

        foreach ($permissions as $key => $value) {
            $role->givePermissionTo($value->name);
        }
    }
}

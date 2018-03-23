<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name', '=', 'sysop')->first();

        $permissions = Permission::all();

        foreach ($permissions as $key => $value) {
            $role->attachPermission($value);
        }

    }
}

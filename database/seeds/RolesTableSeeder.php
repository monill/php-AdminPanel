<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roles = [
            [
                'name' => 'sysop',
                'description' => 'Sysop de todo sistema'
            ],
            [
                'name' => 'admin',
                'description' => 'Admin sem alguns acessos sysop'
            ],
            [
                'name' => 'user',
                'description' => 'User como acesso limitado'
            ]
        ];

        foreach ($roles as $key => $role) {
            Role::create($role);
        }
    }
}

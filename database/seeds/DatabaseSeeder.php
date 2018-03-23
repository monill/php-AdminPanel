<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             UsersTableSeeder::class,
             PermissionTableSeeder::class,
             SettingsTableSeeder::class,
             RolesTableSeeder::class,
             RoleUsersTableSeeder::class,
             RolesAndPermissionsSeeder::class
         ]);
    }
}

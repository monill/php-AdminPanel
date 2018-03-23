<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name' => 'c-blog',
                'description' => 'Create blog'
            ],
            [
                'name' => 'r-blog',
                'description' => 'Read blog'
            ],
            [
                'name' => 'u-blog',
                'description' => 'Update blog'
            ],
            [
                'name' => 'd-blog',
                'description' => 'Delete blog'
            ],
            [
                'name' => 'c-blogcateg',
                'description' => 'Create blog category'
            ],
            [
                'name' => 'r-blogcateg',
                'description' => 'Read blog category'
            ],
            [
                'name' => 'u-blogcateg',
                'description' => 'Update blog category'
            ],
            [
                'name' => 'd-blogcateg',
                'description' => 'Delete blog category'
            ],
            [
                'name' => 'r-logs',
                'description' => 'Read logs'
            ],
            [
                'name' => 'c-permissions',
                'description' => 'Create permissions'
            ],
            [
                'name' => 'r-permissions',
                'description' => 'Read permissions'
            ],
            [
                'name' => 'u-permissions',
                'description' => 'Update permissions'
            ],
            [
                'name' => 'd-permissions',
                'description' => 'Delete permissions'
            ],
            [
                'name' => 'c-roles',
                'description' => 'Create roles'
            ],
            [
                'name' => 'r-roles',
                'description' => 'Read roles'
            ],
            [
                'name' => 'u-roles',
                'description' => 'Update roles'
            ],
            [
                'name' => 'd-roles',
                'description' => 'Delete roles'
            ],
            [
                'name' => 'c-services',
                'description' => 'Create services'
            ],
            [
                'name' => 'r-services',
                'description' => 'Read services'
            ],
            [
                'name' => 'u-services',
                'description' => 'Update services'
            ],
            [
                'name' => 'd-services',
                'description' => 'Delete services'
            ],
            [
                'name' => 'r-settings',
                'description' => 'Read settings'
            ],
            [
                'name' => 'u-settings',
                'description' => 'Update settings'
            ],
            [
                'name' => 'c-users',
                'description' => 'Create users'
            ],
            [
                'name' => 'r-users',
                'description' => 'Read users'
            ],
            [
                'name' => 'u-users',
                'description' => 'Update users'
            ],
            [
                'name' => 'd-users',
                'description' => 'Delete users'
            ],
            [
                'name' => 'r-visitors',
                'description' => 'Read visitors'
            ],
            [
                'name' => 'clearcache',
                'description' => 'Clear cache'
            ]
        ];

        foreach ($permissions as $key => $permission) {
            Permission::create($permission);
        }
    }
}

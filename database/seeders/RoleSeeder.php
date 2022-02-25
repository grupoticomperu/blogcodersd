<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=>'Admin']);
        $role2 = Role::create(['name'=>'Blogger']);

        Permission::create(['name'=>'admin.home'])->SyncRoles([$role1, $role2]);

        Permission::create(['name'=>'admin.users.index'])->SyncRoles([$role1]);
        Permission::create(['name'=>'admin.users.edit'])->SyncRoles([$role1]);
        Permission::create(['name'=>'admin.users.update'])->SyncRoles([$role1]);

        Permission::create(['name'=>'admin.categories.index'])->SyncRoles([$role1]);
        Permission::create(['name'=>'admin.categories.create'])->SyncRoles([$role1]);
        Permission::create(['name'=>'admin.categories.edit'])->SyncRoles([$role1]);
        Permission::create(['name'=>'admin.categories.destroy'])->SyncRoles([$role1]);

        Permission::create(['name'=>'admin.tags.index'])->SyncRoles([$role1]);
        Permission::create(['name'=>'admin.tags.create'])->SyncRoles([$role1]);
        Permission::create(['name'=>'admin.tags.edit'])->SyncRoles([$role1]);
        Permission::create(['name'=>'admin.tags.destroy'])->SyncRoles([$role1]);

        Permission::create(['name'=>'admin.posts.index'])->SyncRoles([$role1, $role2]);
        Permission::create(['name'=>'admin.posts.create'])->SyncRoles([$role1, $role2]);
        Permission::create(['name'=>'admin.posts.edit'])->SyncRoles([$role1, $role2]);
        Permission::create(['name'=>'admin.posts.destroy'])->SyncRoles([$role1, $role2]);


    }
}

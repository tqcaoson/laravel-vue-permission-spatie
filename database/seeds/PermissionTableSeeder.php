<?php
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder{

    /**

     * Run the database seeds.
     *
     * @return void
     */

    public function run(){
       $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'category-list',
           'category-create',
           'category-edit',
           'category-delete',
           'subCategory-list',
           'subCategory-create',
           'subCategory-edit',
           'subCategory-delete',
           'content-list',
           'content-create',
           'content-edit',
           'content-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete'
        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);

        }

    }

}
<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
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
                'id' => '1',
                'name' => 'user-list',
                'display_name' => 'المستخدمين',
                'guard_name' => 'web',
                'routes' => 'dashboard.users.index',
            ], [
                'id' => '2',
                'name' => 'user-create',
                'display_name' => 'المستخدمين',
                'guard_name' => 'web',
                'routes' => 'dashboard.users.create,dashboard.users.store',
            ], [
                'id' => '3',
                'name' => 'user-edit',
                'display_name' => 'المستخدمين',
                'guard_name' => 'web',
                'routes' => 'dashboard.users.edit,dashboard.users.update',
            ], [
                'id' => '4',
                'name' => 'user-delete',
                'display_name' => 'المستخدمين',
                'guard_name' => 'web',
                'routes' => 'dashboard.users.destroy',
            ], [
                'id' => '5',
                'name' => 'user-show',
                'display_name' => 'المستخدمين',
                'guard_name' => 'web',
                'routes' => 'dashboard.users.show',
            ],[
                'id' => '6',
                'name' => 'user-showProfile',
                'display_name' => 'المستخدمين',
                'guard_name' => 'web',
                'routes' => 'dashboard.users.showProfile',
            ],[
                'id' => '7',
                'name' => 'user-profile',
                'display_name' => 'المستخدمين',
                'guard_name' => 'web',
                'routes' => 'dashboard.users.profile',
            ], [
                'id' => '9',
                'name' => 'role-list',
                'display_name' => 'الصلاحيات',
                'guard_name' => 'web',
                'routes' => 'dashboard.roles.index',
            ], [
                'id' => '10',
                'name' => 'role-create',
                'display_name' => 'الصلاحيات',
                'guard_name' => 'web',
                'routes' => 'dashboard.roles.create,dashboard.roles.store',
            ], [
                'id' => '11',
                'name' => 'role-edit',
                'display_name' => 'الصلاحيات',
                'guard_name' => 'web',
                'routes' => 'dashboard.roles.edit,dashboard.roles.update',
            ], [
                'id' => '12',
                'name' => 'role-delete',
                'display_name' => 'الصلاحيات',
                'guard_name' => 'web',
                'routes' => 'dashboard.roles.destroy',
            ], [
                'id' => '13',
                'name' => 'role-show',
                'display_name' => 'الصلاحيات',
                'guard_name' => 'web',
                'routes' => 'dashboard.roles.show',
            ],[
                'id' => '14',
                'name' => 'setting-list',
                'display_name' => 'الإعدادات',
                'guard_name' => 'web',
                'routes' => 'dashboard.settings.index',
            ],[
                'id' => '15',
                'name' => 'setting-edit',
                'display_name' => 'الإعدادات',
                'guard_name' => 'web',
                'routes' => 'dashboard.settings.update',
            ],[
                'id' => '16',
                'name' => 'dashboard-index',
                'display_name' => 'الرئيسيه',
                'guard_name' => 'web',
                'routes' => 'dashboard.index',
            ],
        ];


        Permission::insert($permissions);
    }
}

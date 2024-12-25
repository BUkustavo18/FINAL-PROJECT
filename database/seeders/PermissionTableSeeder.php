<?php

namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'user-list',
           'user-create',
           'user-delete',
           'user-edit',
           'product-list',
           'product-create',
           'product-edit',
           'product-delete',
           'dailylog-list',   // permission to view daily logs
           'dailylog-create',  // permission to create daily logs
           'dailylog-edit',   // permission to edit daily logs
           'dailylog-delete',
           'report-index'

        ];
        
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
       }
    }
}
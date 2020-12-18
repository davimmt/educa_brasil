<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class PermissionTablesSeeder extends Seeder
{
    protected $toTruncate = ['permissions', 'roles', 'role_has_permissions'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        foreach($this->toTruncate as $table) {
            \DB::table($table)->truncate();
        }
                
        Role::create(['name' => 'adm']);
        $colab_role = Role::create(['name' => 'colab']);

        Permission::create(['name' => 'create_article']);
        Permission::create(['name' => 'edit_article']);
        Permission::create(['name' => 'hide_article']);
        Permission::create(['name' => 'remove_article']);

        Permission::create(['name' => 'create_piece']);
        Permission::create(['name' => 'edit_piece']);
        Permission::create(['name' => 'hide_piece']);
        Permission::create(['name' => 'remove_piece']);

        $colab_role->syncPermissions(['create_article']);

        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        Model::reguard();
    }
}

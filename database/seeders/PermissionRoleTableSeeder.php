<?php
namespace Database\Seeders;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run(): void
    {
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));
        $user_permissions = $admin_permissions->filter(function ($permission): bool {
            return substr($permission->title, 0, 7) == 'ticket_' && $permission->title != 'ticket_delete' && $permission->title != 'ticket_create';
        });
        Role::findOrFail(2)->permissions()->sync($user_permissions);
    }
}

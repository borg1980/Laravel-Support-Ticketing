<?php
namespace Database\Seeders;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '17',
                'title' => 'status_create',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '18',
                'title' => 'status_edit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '19',
                'title' => 'status_show',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '20',
                'title' => 'status_delete',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '21',
                'title' => 'status_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '22',
                'title' => 'priority_create',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '23',
                'title' => 'priority_edit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '24',
                'title' => 'priority_show',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '25',
                'title' => 'priority_delete',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '26',
                'title' => 'priority_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '27',
                'title' => 'category_create',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '28',
                'title' => 'category_edit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '29',
                'title' => 'category_show',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '30',
                'title' => 'category_delete',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '31',
                'title' => 'category_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '32',
                'title' => 'ticket_create',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '33',
                'title' => 'ticket_edit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '34',
                'title' => 'ticket_show',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '35',
                'title' => 'ticket_delete',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '36',
                'title' => 'ticket_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '37',
                'title' => 'comment_create',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '38',
                'title' => 'comment_edit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '39',
                'title' => 'comment_show',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '40',
                'title' => 'comment_delete',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '41',
                'title' => 'comment_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '42',
                'title' => 'audit_log_show',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '43',
                'title' => 'audit_log_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '44',
                'title' => 'dashboard_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '45',
                'title' => 'client_create',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '46',
                'title' => 'client_edit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '47',
                'title' => 'client_show',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '48',
                'title' => 'client_delete',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => '49',
                'title' => 'client_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Permission::insert($permissions);
    }
}

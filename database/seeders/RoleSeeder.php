<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'view-package']);
        Permission::create(['name' => 'create-package']);
        Permission::create(['name' => 'edit-package']);
        Permission::create(['name' => 'deactivate-package']);
        Permission::create(['name' => 'view-user-package-price']);
        Permission::create(['name' => 'view-reseller-package-price']);
        Permission::create(['name' => 'view-package-status']);
        Permission::create(['name' => 'view-user']);
        Permission::create(['name' => 'create-user']);
        Permission::create(['name' => 'edit-user']);
        Permission::create(['name' => 'view-reseller']);
        Permission::create(['name' => 'create-reseller']);
        Permission::create(['name' => 'edit-reseller']);
        Permission::create(['name' => 'view-accounting']);
        Permission::create(['name' => 'create-accounting']);
        Permission::create(['name' => 'view-payment']);
        Permission::create(['name' => 'create-payment']);
        Permission::create(['name' => 'view-subscription']);
        Permission::create(['name' => 'view-report']);
        Permission::create(['name' => 'view-mikrotik']);
        Permission::create(['name' => 'view-ticket']);
        Permission::create(['name' => 'edit-ticket']);
        Permission::create(['name' => 'create-comment']);
        Permission::create(['name' => 'view-service-zone']);
        Permission::create(['name' => 'create-service-zone']);
        Permission::create(['name' => 'edit-service-zone']);

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());
        User::factory()->create()->assignRole($admin->name);

        $reseller = Role::create(['name' => 'reseller']);
        $reseller->givePermissionTo([
            'view-package',
            'view-user',
            'create-user',
            'edit-user',
            'view-payment',
            'create-payment',
            'view-subscription',
            'view-ticket',
            'edit-ticket',
            'create-comment',
            'view-reseller-package-price',
        ]);

        $user = Role::create(['name' => 'user']);
        $user->givePermissionTo([
            'view-package',
            'view-payment',
            'create-payment',
            'view-subscription',
            'view-ticket',
            'edit-ticket',
            'create-comment',
        ]);
    }
}

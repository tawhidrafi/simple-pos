<?php

namespace App\Services;

use App\Models\Admin\Permission;
use App\Models\Admin\Role;
use Illuminate\Support\Facades\DB;

class RoleService
{
    public function storeRoleWithPermissions(string $roleName, array $permissions = []): bool
    {
        DB::beginTransaction();

        try {
            $role = Role::create(['name' => $roleName]);

            $permissionIds = [];
            foreach ($permissions as $permissionName) {
                $permission = Permission::firstOrCreate(['name' => $permissionName]);
                $permissionIds[] = $permission->id;
            }

            $role->permissions()->syncWithoutDetaching($permissionIds);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }
}

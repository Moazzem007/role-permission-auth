<?php
namespace App\Repositories;

use App\Models\Permission;

class PermissionRepository implements PermissionRepositoryInterface
{
    public function getAllPermissions()
    {
        return Permission::all();
    }

    public function getPermissionById($id)
    {
        return Permission::findOrFail($id);
    }

    public function createPermission(array $data)
    {
        return Permission::create($data);
    }

    public function updatePermission($id, array $data)
    {
        $permission = Permission::findOrFail($id);
        $permission->update($data);
        return $permission;
    }

    public function deletePermission($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        return $permission;
    }
}

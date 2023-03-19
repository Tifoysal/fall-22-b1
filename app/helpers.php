<?php


function checkHasPermission($role_id, $permission_name)
{
    if(auth()->user()->id==1)
    {
        return true;
    }
    $permission = \App\Models\Permission::where('name', $permission_name)->first();
    if ($permission) {
        $checkPermission = \App\Models\RolePermission::where('role_id', $role_id)
            ->where('permission_id', $permission->id)->first();
        if ($checkPermission) {
            return true;
        }
    }
    return false;


}

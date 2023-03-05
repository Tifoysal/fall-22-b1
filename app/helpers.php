<?php


function checkHasPermission($role_id,$permission_name)
{
        $permission_id=\App\Models\Permission::where('name',$permission_name)->first()->id;

       $checkPermission=\App\Models\RolePermission::where('role_id',$role_id)
                                                    ->where('permission_id',$permission_id)->first();

       if($checkPermission)
       {
           return true;
       }
       return false;
}

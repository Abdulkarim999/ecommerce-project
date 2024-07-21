<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PermissionRoleModel extends Model
{
    use HasFactory;
	protected $table = 'permission_role';

	public static function InsertUpdateRecord($permission_ids, $role_id)
{
    // Check if $permission_ids is not null and is iterable
    if (!is_array($permission_ids)) {
        // Handle the case where $permission_ids is not an array (possibly null or unexpected type)
        // Log or throw an error, or handle gracefully based on your application's logic
        return; // Or handle accordingly
    }

    foreach ($permission_ids as $permission_id) {
        $save = new PermissionRoleModel;
        $save->permission_id = $permission_id;
        $save->role_id = $role_id; 
        $save->save();
    }
}
    
}

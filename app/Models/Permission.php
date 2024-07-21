<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
	protected $fillable = [
        'name',
        'slug',
        'groupby',
    ];

	static public function getSingle($id){
		return RoleModel::find($id);
	}

	 public static function getRecord()
    {
        $permissions = Permission::groupBy('groupby')->get();
        $result = [];

        foreach ($permissions as $permission) {
            $data = [
                'id' => $permission->id,
                'name' => $permission->name,
                'group' => self::getPermissionGroup($permission->groupby)
            ];
            $result[] = $data;
        }

        return $result;
    }

    // Method to fetch permissions by 'groupby'
    public static function getPermissionGroup($groupby)
    {
        return Permission::where('groupby', $groupby)->get();
    }
}

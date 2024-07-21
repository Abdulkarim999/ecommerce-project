<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleModel;
use App\Models\Permission;
use App\Models\PermissionRoleModel;

class RoleController extends Controller
{
    public function list(){
		$save = RoleModel:: all();
		return view('admin.list',compact('save'));
	}

	
    public function add (Request $request){
	$save = new RoleModel;
	$save->name = $request->name;
	$save->save();
	 toastr()->success('Role Added Successfully.');
	return redirect()->back();
   }

   public function edit_role($id){
	$save = RoleModel::find($id);
	return view('admin.edit_role',compact('save'));
   }

   public function delete_role($id){
	$save = RoleModel::find($id);
	$save->delete();
    
    sweetalert()->error('Are you sure to Delete this.');
	return redirect()->back();
	
}

public function update_role(Request $request, $id){
	$save = RoleModel::find($id);
	$save->name = $request->name;
	$save->save();
	 toastr()->success('Role Updated Successfully.');
	return redirect('/panel_role');
}

public function permission_role(){
	 $permissions = Permission::getRecord();
	  return view('admin.permission', ['permissions' => $permissions]);
}

 public function index()
    {

        $permissions = Permission::all(); // Fetch permissions from your database
        return view('permissions.index', ['permissions' => $permissions]);
    }

    // Handle permission assignment
    public function assign(Request $request){
	$save = new RoleModel;
	$save->name = $request->name;
	$save->save();
	PermissionRoleModel::InsertUpdateRecord($request->permission_id, $save->id);
	toastr()->success('Permission Successfully.');

	return redirect()->back();
{
   
   

}
}
}
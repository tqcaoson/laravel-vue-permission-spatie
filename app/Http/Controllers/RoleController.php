<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use DB;
use Auth;
    

class RoleController extends Controller{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct(){

        //  $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        //  $this->middleware('permission:role-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:role-delete', ['only' => ['destroy']]);

    }
   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){

        $roles = Role::orderBy('id','DESC')->get();
        return response()->json(['roleList'=>$roles],200);
      

    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(){

        $permission = Permission::get();
        return view('roles.create',compact('permission'));

    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response

     */

    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',

        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
        return ['status'=>'success'];

    }

    /**

     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id) {

        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)->get();
        return view('roles.show',compact('role','rolePermissions'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id){

        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        $SelectedRoleLength = count($rolePermissions)+1;

        // echo "<pre>";print_r($permission);
        // echo "<pre>dd";print_r($rolePermissions);die;

        return response()->json(['role'=>$role,'permission'=>$permission,'rolePermissions'=>$rolePermissions,'SelectedRoleLength'=>$SelectedRoleLength],200);

    }

    /**

     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id){

        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',

        ]);
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions($request->input('permission'));
        return response()->json(['status'=>'success'],200);

    }

    /**

     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id){

        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')->with('success','Role deleted successfully');

    }

    public function getPermission(){
        $permissionList = Permission::orderBy('id','ASC')->get();
        return response()->json(['permissionList'=>$permissionList],200);
    }

    public function roleWisePermissionList(){
        $id = Auth::user()->id;
        $roleWisePermissionList = DB::table('model_has_roles')
        ->join('role_has_permissions','model_has_roles.role_id','=','role_has_permissions.role_id')
        ->join('permissions','role_has_permissions.permission_id','=','permissions.id')
        ->select('permissions.name','permissions.id')
        ->where('model_has_roles.model_id',$id)
        ->get();

        return response()->json(['roleWisePermissionList'=>$roleWisePermissionList],200);
    }

}

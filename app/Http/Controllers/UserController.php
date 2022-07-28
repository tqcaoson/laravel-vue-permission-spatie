<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;

    

class UserController extends Controller{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){

        $userList = DB::table('users')
        ->join('model_has_roles','users.id','=','model_has_roles.model_id')
        ->join('roles','model_has_roles.role_id','=','roles.id')
        ->select('users.*', 'roles.name as role_name')
        ->get();

       return response()->json(['userList'=>$userList],200);
        
        

    }

    

    /**

     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(){
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:cpassword',
            'roles' => 'required'

        ]);
        $input = $request->all();

        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);

        $user->assignRole($request->input('roles'));
        return response()->json(['status'=>'success'],200);

    }

    /**

     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id){

        $user = User::find($id);
        return view('users.show',compact('user'));
    }
   

    /**

     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id){
        $userById = DB::table('users')
        ->join('model_has_roles','users.id','=','model_has_roles.model_id')
        ->join('roles','model_has_roles.role_id','=','roles.id')
        ->select('users.*', 'roles.id as roles')
        ->where('users.id',$id)
        ->first();
        

       return response()->json(['userById'=>$userById],200);

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
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-cpassword',
            'roles' => 'required'

        ]);

        $input = $request->all();

        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            unset($input['password']);
            
            // $input = array_except($input,array('password'));    
        }
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));
        return response()->json(['status'=>'success'],200);

    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        User::find($id)->delete();
        return response()->json(['status'=>'success'],200);

    }

}
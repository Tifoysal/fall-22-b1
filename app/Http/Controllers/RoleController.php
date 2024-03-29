<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('backend.pages.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),
            [
                'role_name' => 'required|unique:roles,name',
            ],
            [
                'role_name.required' => 'Role Name is required.',
                'role_name.unique' => 'Role Name is already exist.',
            ]
        );
        if ($validate->fails()) {
            notify()->error($validate->errors());
            return redirect()->back();
        }

        Role::create(
            [
                'name' => $request->role_name
            ]
        );

        notify()->success('Role Created Successfully.');
        return redirect()->route('roles.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        return view('backend.pages.roles.show', compact('role'));
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        return view('backend.pages.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $roles = Role::find($id);
        $roles->update([
            'name' => $request->role_name,
            'status' => $request->role_status
        ]);
        notify()->success('Role updated.');
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $test = Role::find($id);
            if ($test) {
                $test->delete();
                notify()->success('Role deleted');

            } else {
                notify()->error('Role not found.');
            }
        }catch (\Throwable $error){
            if(config('app.env')=='local')
            {
                notify()->error($error->getMessage());
            }else{
                notify()->error("something went wrong.");
            }
        }
        return redirect()->back();
    }

    public function showPermissions($id){
        $role=Role::with('permissions')->find($id);

        $permissions=Permission::all();
        return view('backend.pages.roles.assign',compact('permissions','role'));
    }

    public function assignPermissions(Request $request,$role_id)
    {
//        dd($request->all());
        RolePermission::where('role_id',$role_id)->delete();
        foreach($request->permission as $permission){
            RolePermission::create([
                'role_id'=>$role_id,
                'permission_id'=>$permission
            ]);
        }
        notify()->success('Permissions assigned.');
        return redirect()->back();
    }
}

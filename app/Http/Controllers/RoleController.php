<?php

namespace App\Http\Controllers;

use App\Models\Role;
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
        $roles=Role::all();
        return view('backend.pages.roles.index',compact('roles'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validate= Validator::make($request->all(),
            [
           'role_name'=>'required|unique:roles,name',
            ],
            [
                'role_name.required'=>'Role Name is required.',
                'role_name.unique'=>'Role Name is already exist.',
            ]
       );
       if($validate->fails())
       {
          notify()->error($validate->errors());
           return redirect()->back();
       }

       Role::create(
           [
               'name'=>$request->role_name
           ]
       );

       notify()->success('Role Created Successfully.');
       return redirect()->route('roles.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role=Role::find($id);
        return view('backend.pages.roles.show',compact('role'));
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
        $roles=Role::find($id);
        
        $roles->update([
         
            'name'=>$request->role_name,
            'status'=>$request->role_status

        ]);
        notify()->success('Role updated');
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test=Role::find($id);
        if($test)
        {
            $test->delete();
            return redirect()->back()->with('message','Role deleted successfully.');
        }
        else
        {
            return redirect()->back()->with('error','Role not found.');
        }
    }
}

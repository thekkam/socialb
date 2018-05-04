<?php

namespace App\Http\Controllers;

use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id', 'ASC')->paginate(10);
        
        return view('admin.roles.index')->with('roles', $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();

        return view('admin.roles.create')->with('permissions', $permissions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = new Role;
        $slug = $request->name;
        $slug = Str::slug($slug);
        $role->slug = $slug;
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();

        $permissions = Permission::all();
        $x = 1;

        foreach ($permissions as $permission) {
            if($request->$x == "on" && $permission->id == $x){
                $role->assignPermission($x);
            }
            $x = $x + 1;
        }
        
        return redirect('roles/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();

        return view('admin.roles.edit')->with('role', $role)->with('permissions', $permissions);
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
        $role = Role::find($id);
        $slug = $request->name;
        $role->slug = $slug;
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();

        $permissions = Permission::all();
        $x = 1;

        foreach ($permissions as $permission) {
            if($request->$x == "on" && $permission->id == $x && $role->can('access.admin') != 'true'){
                $role->assignPermission($x);
            }
            elseif(!($request->$x) && $permission->id == $x && $role->can('access.admin') != 'true') {
                $role->revokePermission($x);
            }
            $x = $x + 1;
        }
        
        return redirect('roles/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();

        return redirect('roles/');
    }
}

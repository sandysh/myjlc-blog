<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view roles', ['only' => ['index']]);
        $this->middleware('permission:add roles', ['only' => ['create']]);
        $this->middleware('permission:add roles', ['only' => ['store']]);
        $this->middleware('permission:edit roles', ['only' => ['edit']]);
        $this->middleware('permission:update roles', ['only' => ['update']]);
        $this->middleware('permission:delete roles', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::withCount('users')->paginate();
        return view('admin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'string|unique:roles']);
        Role::create(['name' => $request->name]);
        return redirect()->route('roles.index')->with('success','Role created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {

    }

    public function editPermissions(Role $role)
    {
        $rolePermissions = $role->permissions->pluck('name')->toArray();
        $permissions = Permission::all();
        return view('admin.roles.permissions',compact('permissions','role','rolePermissions'));
    }

    public function updatePermissions(Role $role, Request $request)
    {
        $permissions = array_keys($request['permissions']);
        $role->syncPermissions($permissions);
        return redirect()->route('roles.index')->with('success','Permissions updated');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Role $role, Request $request)
    {
        $role->update(['name'=>$request->name]);
        return redirect()->route('roles.index')->with('success','Role updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $count = $role->users->count();
        if ($count > 0) {
            return redirect()->route('roles.index')->with('error','Cannot delete this role, Users are associated
            with this role, Reassign users or delete users to free this role and try again');
        }
        $role->delete();
        return redirect()->route('roles.index')->with('success','Role updated');
    }
}

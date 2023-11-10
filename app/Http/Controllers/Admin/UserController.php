<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use function PHPUnit\Framework\isEmpty;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view users', ['only' => ['index']]);
        $this->middleware('permission:add users', ['only' => ['create']]);
        $this->middleware('permission:add users', ['only' => ['store']]);
        $this->middleware('permission:edit users', ['only' => ['edit']]);
        $this->middleware('permission:update users', ['only' => ['update']]);
        $this->middleware('permission:delete users', ['only' => ['destroy']]);
    }

    public function index(User $user)
    {
        $users = $user->paginate();
        return view('admin.users.index',compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->active ? $request['active'] = 1 : $request['active'] = 0;
        $user = User::create($request->all());
        $user->assignRole($request->role);
        return redirect()->route('users.index')->with('success','User created');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit',compact('user','roles'));
    }

    public function update(User $user, Request $request)
    {
        if (isEmpty($request->password)) {
            unset($request['password']);
        }
        $request->active ? $request['active'] = 1 : $request['active'] = 0;
        $user->update($request->all());
        $user->syncRoles($request->role);
        return redirect()->route('users.index')->with('success','User updated');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success','User deleted');
    }
}

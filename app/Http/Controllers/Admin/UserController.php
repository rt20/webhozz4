<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $rows = User::all();
        return view('admin.users.index', [
            'rows' => $rows
        ]);
    }

    public function create()
    {
        $roles = Role::get();
        return view('admin.users.create', [
            'roles' => $roles
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:120',
            'username' => 'required|max:120',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::create($request->only('email', 'username', 'name', 'password'));

        $roles = $request['roles'];
        if (isset($roles)) {
            foreach ($roles as $role) {
                $role_r = Role::where('id', $role)->firstOrFail();
                $user->assignRole($role_r);
            }
        }

        flash('Your data has been created')->success();
        return redirect()->route('admin.users.index')->with('flash_message', 'User successfully added.');
    }

    public function show($id)
    {
        return redirect('admin.users');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::get();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|max:120',
            'email' => 'required|username|unique:users,username,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required|min:6|confirmed'
        ]);

        $input = $request->only(['name', 'username', 'email', 'password']);
        $roles = $request['roles'];
        $user->fill($input)->save();

        if (isset($roles)) {
            $user->roles()->sync($roles);
        } else {
            $user->roles()->detach();
        }

        return redirect()->route('admin.users.index')->with('flash_message', 'User successfully edited.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('flash_message', 'User successfully deleted.');
    }
}

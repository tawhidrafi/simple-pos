<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRoleRequest;
use App\Models\Admin\Permission;
use App\Models\Admin\Role;
use App\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // service class
    protected $roleService;
    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }
    // active roles
    public function index()
    {
        return view('roles.index', ['roles' => Role::all()]);
    }
    // create new
    public function create()
    {
        return view('roles.create');
    }
    // store new
    public function store(StoreRoleRequest $request)
    {
        $isStored = $this->roleService->storeRoleWithPermissions(
            $request->input('name'),
            $request->input('permissions', [])
        );
        return $isStored
            ? redirect()->route('roles.index')->with('success', 'Role and permissions created successfully.')
            : redirect()->route('roles.index')->with('error', 'Failed to create role and permissions.');
    }
    // modify user roles
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,name',
        ]);

        $role->update(['name' => $request->name]);

        $permissionIds = Permission::whereIn('name', $request->permissions)->pluck('id')->toArray();

        $role->permissions()->sync($permissionIds);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }
    // show
    public function show(Role $role)
    {
        $permissions = Permission::all();
        $assignedPermissions = $role->permissions->pluck('name')->toArray();
        return view('roles.show', compact('role', 'permissions', 'assignedPermissions'));
    }
    // delete role
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
}
